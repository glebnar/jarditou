-- requete 1
SELECT CompanyName AS 'société', ContactName AS 'contact', ContactTitle AS 'fonction', Phone AS 'téléphone' FROM customers
WHERE Country = 'France';

-- requete 2
SELECT ProductName AS 'Produit', UnitPrice AS 'Prix' FROM products
JOIN suppliers
ON products.SupplierID=suppliers.SupplierID
WHERE CompanyName='Exotic Liquids';

-- requete3
SELECT CompanyName AS 'Fournisseur', COUNT(ProductName) AS 'Nbre produits' FROM suppliers
JOIN products
ON suppliers.SupplierID=products.SupplierID
WHERE Country ='France'
GROUP BY CompanyName
ORDER BY COUNT(ProductName) DESC;

-- requete4
SELECT CompanyName AS 'Client', COUNT(orders.CustomerID) AS 'Nbre commandes' FROM customers
JOIN orders
ON customers.CustomerID=orders.CustomerID
WHERE country='France'
GROUP BY CompanyName
having COUNT(orders.CustomerID)>10;

-- requete5 
SELECT CompanyName AS 'Client', SUM(`order details`.UnitPrice*Quantity)AS CA, Country AS 'pays' FROM customers
JOIN orders
ON customers.CustomerID=orders.CustomerID
JOIN `order details`
ON `order details`.OrderID=orders.OrderID
GROUP BY CompanyName,Country
HAVING SUM(`order details`.UnitPrice*Quantity)>30000
ORDER BY SUM(`order details`.UnitPrice*Quantity) desc;

-- requete6
SELECT distinct customers.Country AS 'Pays' FROM customers
JOIN orders
ON customers.CustomerID=orders.CustomerID
JOIN `order details`
ON `order details`.OrderID=orders.OrderID
JOIN products
ON `order details`.ProductID=products.ProductID
JOIN suppliers
ON products.SupplierID=suppliers.SupplierID
WHERE suppliers.CompanyName='Exotic Liquids'
ORDER BY customers.Country asc
;

-- requete7

SELECT SUM(`order details`.UnitPrice*Quantity) AS 'montant ventes'FROM `order details`
JOIN orders
ON `order details`.OrderID=orders.OrderID
WHERE year(orders.OrderDate)=1997

;

-- requete8
SELECT month(orders.OrderDate) AS 'mois', SUM(`order details`.UnitPrice*Quantity) AS 'montant ventes'FROM `order details`
JOIN orders
ON `order details`.OrderID=orders.OrderID
WHERE year(orders.OrderDate)=1997
GROUP BY month(orders.OrderDate);

-- requete9

SELECT max(OrderDate) AS 'date de dernière commande' FROM orders
JOIN customers
ON orders.CustomerID=customers.CustomerID
WHERE CompanyName='Du monde entier'
;

-- requete 10

SELECT round(AVG(DATEDIFF(ShippedDate,OrderDate)),0) AS 'délai moyen de livraison en jours' FROM orders;