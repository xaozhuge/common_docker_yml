<?php
	// 连接到 MongoDB
	// mongoClient 适合 mongo版本 3.4.24，无法使用 mongo版本 7.0版本
	$mongoClient = new \mongoClient("mongodb://admin:admin@172.16.1.218:27017");

	// 选择或创建数据库
	// 请将 "your_database" 替换为实际的数据库名称
	$database = $mongoClient->selectDB("your_database1");

	// 选择或创建集合
	// 请将 "your_collection" 替换为实际的集合名称
	$collection = $database->selectCollection("your_collection");

	$document = [
	    'name' => 'John',
	    'age' => 30,
	    'city' => 'New York',
	];

	// 插入文档
	$insertResult = $collection->insert($document);
	echo "Inserted document with ID: " . $insertResult['_id'] . PHP_EOL;

	// 查询文档
	$query = ['name' => 'John'];
	$document = $collection->findOne($query);

	// 更新文档
	$updateResult = $collection->update(
	    ['name' => 'John'],
	    ['$set' => ['age' => 31]],
	    ['multi' => false]
	);
	echo "Modified {$updateResult['nModified']} document(s)" . PHP_EOL;

	// 查询更新后的文档
	$updatedDocument = $collection->findOne(['name' => 'John']);
	var_dump($updatedDocument);

	// 删除文档
	// $deleteResult = $collection->remove(['name' => 'John']);
	echo "Deleted {$deleteResult['n']} document(s)" . PHP_EOL;
