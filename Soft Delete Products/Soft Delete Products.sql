برای هر جدول یک فیلد به نام
از نوع
Enum
ایجاد کرده و مقادیر 
“Active” و “DeActive” 
را برای آن تعریف کرده ایم.
برای انجام عمل سافت دیلیت، مقدار این فیلد رو آپدیت کرده و از مقدار 
“DeActive” 
استفاده می کنیم.

UPDATE products
SET Status = 'DeActive'
WHERE Id = 1