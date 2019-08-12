SELECT p_name AS '商品名稱',howmany AS '購買數量'
FROM `transaction` LEFT JOIN `selling_product` ON `transaction`.`p_id` = selling_product.p_id
WHERE member_id = 'qq'

DELETE FROM `transaction` WHERE howmany=0;

SELECT SUM(howmany) AS 總購買數 FROM `transaction` WHERE member_id = 'qq' && p_id = '3';
