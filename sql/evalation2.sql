--1 - Liste des contacts français : 
SELECT CompanyName as 'Société',ContactName as 'contact', ContactTitle as 'Fonction', Phone as 'Téléphone' From Customers
where Country = "france"


--2 - Produits vendus par le fournisseur « Exotic Liquids » :
SELECT ProductName as 'Produit', UnitPrice as 'Prix' FROM products 
JOIN suppliers ON suppliers.SupplierID = products.SupplierID 
WHERE CompanyName = "Exotic Liquids"


--3 - Nombre de produits vendus par les fournisseurs Français dans l’ordre décroissant :
select CompanyName as Fournisseur, COUNT(suppliers.SupplierID) as Nbre_produits from products 
join suppliers on suppliers.SupplierID = products.SupplierID 
where Country = "France" 
GROUP by suppliers.SupplierID 
order by Nbre_produits desc

--4 - Liste des clients Français ayant plus de 10 commandes :
SELECT CompanyName as client,COUNT(order.customerID)  FROM Customers
JOIN orders
ON Customers.customerID=orders.customerID
where Country="France"
GROUP by orders.customerID
having COUNT(customerID)>10

--5 - Liste des clients ayant un chiffre d’affaires > 30.000 :
SELECT CompanyName as client,sum(UnitPrice*Quantity) as ca, Country as pays from Customers
JOIN orders
on Customers.customerID=orders.customerID
JOIN `order details`
on orders.orderID= `order details`.OrderID
GROUP BY orders.CustomerID
having sum(UnitPrice*Quantity)>30000
order by sum(UnitPrice*Quantity) DESC 

--6– Liste des pays dont les clients ont passé commande de produits fournis par « Exoti Liquids » :
SELECT ShipCountry AS Pays FROM `order details` 
JOIN orders 
ON `order details`.OrderID = orders.OrderID 
JOIN products 
ON  products.ProductID = `order details`.ProductID 
JOIN suppliers
ON suppliers.SupplierID = products.SupplierID AND suppliers.CompanyName = "Exotic Liquids"  
GROUP BY  ShipCountry 
ORDER BY ShipCountry asc

--7 – Montant des ventes de 1997 :
SELECT sum(UnitPrice * Quantity) AS 'Montant Ventes 97' FROM `order details`
JOIN orders 
ON orders.OrderID = `order details`.OrderID AND Year(OrderDate) = "1997" 

--8 – Montant des ventes de 1997 mois par mois :
SELECT MONTH(OrderDate) AS `Mois 97`, sum(UnitPrice * Quantity) AS 'Montant Ventes' FROM `order details` 
JOIN orders 
ON orders.OrderID = `order details`.OrderID AND Year(OrderDate) = "1997"
 GROUP BY MONTH(OrderDate)

-- 9 – Depuis quelle date le client « Du monde entier » n’a plus commandé ?
SELECT MAX(OrderDate) AS 'Date de dernière commande'
FROM orders 
JOIN customers ON orders.CustomerID = customers.CustomerID
WHERE CompanyName = 'Du monde entier';

-- 10 – Quel est le délai moyen de livraison en jours ?
select round(AVG(DATEDIFF(ShippedDate, OrderDate))) AS 'Délai moyen de livraison en jours' from orders
 

