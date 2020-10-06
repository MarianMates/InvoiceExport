<?php

/**
 * Class Export
 *
 * @package     Evozon\InvoiceExport
 * @author      Marian Mates <marian.mates@evozon.com>
 * @copyright   Copyright (c) 2020. Evozon Systems (https://www.evozon.com)
 */
class Evozon_InvoiceExport_Model_Export extends Mage_Core_Model_Abstract
{
    /**
     * Loads the invoice collection in batches, generates a pdf for each invoice and saves it to var/invoice_export folder
     * Returns the number of processed invoices
     * @return int
     */
    public function execute()
    {
        //create var/invoice_export folder if it doesn't exist
        $io = new Varien_Io_File();
        if (!$io->fileExists(Mage::getBaseDir('var') . DS . 'invoice_export', false)) {
            $io->mkdir(Mage::getBaseDir('var') . DS . 'invoice_export');
        }

        //get invoice Collection and set batch size
        $invoiceCollection = Mage::getResourceModel('sales/order_invoice_collection');
        $invoiceCollection->setPageSize(1000);

        $pages = $invoiceCollection->getLastPageNumber();
        $currentPage = 1;
        $invoiceNumber = 0;

        do {
            //load current collection batch
            $invoiceCollection->setCurPage($currentPage);
            $invoiceCollection->load();

            //iterate over invoices, generate PDFs and save them into the file system
            foreach ($invoiceCollection as $invoice) {
                $pdf = Mage::getModel('sales/order_pdf_invoice')->getPdf(array($invoice));
                $order = $invoice->getOrder();

                $createdAt = str_replace(' ', '_', $order->getCreatedAt());
                $customerFirstname = $order->getCustomerFirstname();
                $customerLastname = $order->getCustomerLastname();

                $name = $createdAt . '_' . $customerFirstname . '-' . $customerLastname . '.pdf';
                file_put_contents(Mage::getBaseDir('var') . DS . 'invoice_export' . DS . $name, $pdf->render());

                $invoiceNumber++;
            }

            $currentPage++;
            $invoiceCollection->clear();
        } while ($currentPage <= $pages);

        return $invoiceNumber;
    }
}