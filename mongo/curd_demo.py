import pymongo

# 连接到 MongoDB
# client = pymongo.MongoClient("mongodb://localhost:27017/")
client = pymongo.MongoClient("mongodb://admin:admin@localhost:27017/")

# 选择或创建数据库
db = client["your_database"]
# 请将 "your_database" 替换为实际的数据库名称

# 选择或创建集合
collection = db["your_collection"]
# 请将 "your_collection" 替换为实际的集合名称

# 插入文档
document = {"name": "John", "age": 30, "city": "New York"}
result = collection.insert_one(document)
print(f"Inserted document with ID: {result.inserted_id}")

# 查询文档
query = {"name": "John"}
result = collection.find_one(query)
print(result)

# 更新文档
update_query = {"name": "John"}
update_values = {"$set": {"age": 31}}
collection.update_one(update_query, update_values)
print("Document updated")

# 查询更新后的文档
result = collection.find_one({"name": "John"})
print(result)

# 删除文档
delete_query = {"name": "John"}
collection.delete_one(delete_query)
print("Document deleted")

# 断开与 MongoDB 的连接
client.close()
