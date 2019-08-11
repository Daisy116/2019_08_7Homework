SELECT p_id AS '商品編號',howmany AS '購買數量' FROM `transaction` WHERE member_id = 'test'

SELECT p_name AS '商品名稱',howmany AS '購買數量'
FROM `transaction` LEFT JOIN `selling_product` ON `transaction`.`p_id` = selling_product.p_id
WHERE member_id = 'qq'