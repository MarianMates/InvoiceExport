# InvoiceExport
Magento 1 module for exporting all invoice PDFs in batches

## Installation 
Copy 'local' folder into MAGENTO_ROOT/app/code  
Copy Evozon_InvoiceExport.xml into MAGENTO_ROOT/app/etc/modules  
Clear cache  

## Usage
A new menu item will be available in admin : Sales Export -> Invoice .  
![Menu_Item](https://prnt.sc/utzr3s)  
  
Accessing the item will start the export process and when done, it will redirect to the dashboard with a success message.  
![Success_Message](https://prnt.sc/utzskz)  
  
The invoice PDFs will be saved into the file system, under MAGENTO_ROOT/var/invoice_export folder. Their names will follow this pattern : "orderDate_orderTime_customerFirstname-customerLastname".  
![Success_Message](https://ibb.co/6nGrwNt)  
