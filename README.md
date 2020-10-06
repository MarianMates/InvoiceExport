# InvoiceExport
Magento 1 module for exporting all invoice PDFs in batches

## Installation 
Copy 'local' folder into MAGENTO_ROOT/app/code  
Copy Evozon_InvoiceExport.xml into MAGENTO_ROOT/app/etc/modules  
Clear cache  

## Usage
A new menu item will be available in admin : Sales Export -> Invoice .  
![menu_item](https://user-images.githubusercontent.com/21063382/95190505-1a451f00-07d8-11eb-96ae-969b5c3d18aa.png)  
  
Accessing the item will start the export process and when done, it will redirect to the dashboard with a success message.  
![success_message](https://user-images.githubusercontent.com/21063382/95190503-19ac8880-07d8-11eb-8465-5e510c3b81f2.png)  
  
The invoice PDFs will be saved into the file system, under MAGENTO_ROOT/var/invoice_export folder. Their names will follow this pattern : "orderDate_orderTime_customerFirstname-customerLastname".  
![files](https://user-images.githubusercontent.com/21063382/95190484-0f8a8a00-07d8-11eb-82e3-546a9ca4c344.png)  
