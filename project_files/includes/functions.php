<?php
function addOrder($pdo) {
	$stmt_insertCustomer = $pdo->prepare('INSERT INTO pizza_customers (cust_fname, cust_lname, cust_phone, cust_address, cust_zip, cust_city, cust_email) 
	VALUES 
	(:fname, :lname, :phone, :address, :zip, :city, :email)');
	$stmt_insertCustomer->bindParam(':fname', $_POST['fname'], PDO::PARAM_STR);
	$stmt_insertCustomer->bindParam(':lname', $_POST['lname'], PDO::PARAM_STR);
	$stmt_insertCustomer->bindParam(':phone', $_POST['phone'], PDO::PARAM_STR);
	$stmt_insertCustomer->bindParam(':address', $_POST['address'], PDO::PARAM_STR);
	$stmt_insertCustomer->bindParam(':zip', $_POST['zip'], PDO::PARAM_STR);
	$stmt_insertCustomer->bindParam(':city', $_POST['city'], PDO::PARAM_STR);
	$stmt_insertCustomer->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
	$stmt_insertCustomer->execute();
	//$user = $stmt_insertCustomer->fetch();

	$last_id = $pdo->lastInsertId();
	
	$stmt_insertOrder = $pdo->prepare('INSERT INTO pizza_orders (pizza_topping_1_fk, pizza_topping_2_fk, pizza_topping_3_fk, pizza_topping_4_fk, pizza_delivery, customer_fk, pizza_oregano, pizza_garlic, pizza_gluten, pizza_size_fk, order_info, order_status_fk) 
	VALUES 
	(:pizza_topping_1_fk, :pizza_topping_2_fk, :pizza_topping_3_fk, :pizza_topping_4_fk, :pizza_delivery, :customer_fk, :pizza_oregano, :pizza_garlic, :pizza_gluten, :pizza_size_fk, :order_info, 1)');
	$stmt_insertOrder->bindParam(':pizza_topping_1_fk', $_SESSION['topping1'], PDO::PARAM_INT);
	$stmt_insertOrder->bindParam(':pizza_topping_2_fk', $_SESSION['topping2'], PDO::PARAM_INT);
	$stmt_insertOrder->bindParam(':pizza_topping_3_fk', $_SESSION['topping3'], PDO::PARAM_INT);
	$stmt_insertOrder->bindParam(':pizza_topping_4_fk', $_SESSION['topping4'], PDO::PARAM_INT);
	$stmt_insertOrder->bindParam(':pizza_delivery', $_SESSION['delivery'], PDO::PARAM_BOOL);
	$stmt_insertOrder->bindParam(':customer_fk', $last_id, PDO::PARAM_INT);
	$stmt_insertOrder->bindParam(':pizza_oregano', $_SESSION['oregano'], PDO::PARAM_BOOL);
	$stmt_insertOrder->bindParam(':pizza_garlic', $_SESSION['garlic'], PDO::PARAM_BOOL);
	$stmt_insertOrder->bindParam(':pizza_gluten', $_SESSION['allergy1'], PDO::PARAM_BOOL);
	$stmt_insertOrder->bindParam(':pizza_size_fk', $_SESSION['size'], PDO::PARAM_INT);
	$stmt_insertOrder->bindParam(':order_info', $_SESSION['additional-info'], PDO::PARAM_STR);
	
	if($stmt_insertOrder->execute()) {
		return "Bestälningen lyckades";
	} else {
		return "Något blev fel";
	}
	
}

function updateOrderStatus($pdo) {
	$stmt_updateOrderStatus = $pdo->prepare("
	UPDATE pizza_orders 
	SET order_status_fk = :newStatus 
	WHERE pizza_id = :currentId");
	$stmt_updateOrderStatus->bindParam(':newStatus', $_POST['order-status']);
	$stmt_updateOrderStatus->bindParam(':currentId', $_POST['cust-id']);
	
	if($stmt_updateOrderStatus->execute()) {
		return "<p class='text-success fst-italic'>Uppdatering av beställningsstatus lyckades</p>";
	} else {
		return "<p>Något blev fel</p>";
	}
}

function selectNodeInfo($pdo, $currentId) {

	$stmt_getNodeData = $pdo->prepare('SELECT * FROM pizza_pages WHERE page_id = :id');
	$stmt_getNodeData->bindParam(':id', $currentId, PDO::PARAM_INT);
	$stmt_getNodeData->execute();
	return $stmt_getNodeData->fetch();
}

function editNode($pdo, $currentId) {
	$stmt_editNodeData = $pdo->prepare('
	UPDATE pizza_pages
	SET page_heading = :pheading, page_text = :ptext
	WHERE page_id = :id');
	$stmt_editNodeData->bindParam(':id', $currentId, PDO::PARAM_INT);
	$stmt_editNodeData->bindParam(':pheading', $_POST['heading'], PDO::PARAM_STR);
	$stmt_editNodeData->bindParam(':ptext', $_POST['page-text'], PDO::PARAM_STR);
	$stmt_editNodeData->execute();

	if($stmt_editNodeData->execute()) {
		return "<p class='text-success fst-italic'>Uppdatering av innehåll lyckades</p>";
	} else {
		return "<p>Något blev fel</p>";
	}

}


?>