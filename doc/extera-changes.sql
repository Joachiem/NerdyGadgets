use nerdygadgets;
-- almost complete missing 2-3 check if checkout works
ALTER TABLE orders DROP CONSTRAINT IF EXISTS FK_Sales_Orders_SalespersonPersonID_Application_People;
ALTER TABLE orders DROP CONSTRAINT IF EXISTS FK_Sales_Orders_ContactPersonID_Application_People;
ALTER TABLE orders DROP CONSTRAINT IF EXISTS FK_Sales_Orders_Application_People;
ALTER TABLE invoices DROP CONSTRAINT IF EXISTS FK_Sales_Invoices_ContactPersonID_Application_People;
ALTER TABLE invoices DROP CONSTRAINT IF EXISTS FK_Sales_Invoices_AccountsPersonID_Application_People;
ALTER TABLE invoices DROP CONSTRAINT IF EXISTS FK_Sales_Invoices_SalespersonPersonID_Application_People;
ALTER TABLE invoices DROP CONSTRAINT IF EXISTS FK_Sales_Invoices_PackedByPersonID_Application_People;
ALTER TABLE invoicelines DROP CONSTRAINT IF EXISTS FK_Sales_InvoiceLines_Application_People;