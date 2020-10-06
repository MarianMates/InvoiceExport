<?php

/**
 * Class ExportController
 *
 * @package     Evozon\InvoiceExport
 * @author      Marian Mates <marian.mates@evozon.com>
 * @copyright   Copyright (c) 2020. Evozon Systems (https://www.evozon.com)
 */
class Evozon_InvoiceExport_ExportController extends Mage_Adminhtml_Controller_Action
{
    /**
     * Executes export and redirects to dashboard with success/error message
     */
    public function invoiceAction()
    {
        try {
            $exporter = $pdf = Mage::getModel('evozon_exporter/export');

            $invoiceNumber = $exporter->execute();
            Mage::getSingleton('core/session')->addSuccess($invoiceNumber . ' Invoices have been exported to MAGENTO_ROOT/var/invoice_export folder');
        } catch (Exception $e) {
            Mage::log($e->getMessage(),null,'invoice_export.log',true);
            Mage::getSingleton('core/session')->addError($e->getMessage());
        }

        $this->_redirect('adminhtml/dashboard/index');
    }
}
