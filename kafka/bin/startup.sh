#!/bin/bash

# 启动 zookeeper
docker exec kafka_c sh -c "nohup /bin/bash /data/kafka/bin/zookeeper-server-start.sh /data/kafka/config/zookeeper.properties >> /data/kafka/logs/zookeeper.out 2>&1 &"
# 启动 kafka
docker exec kafka_c sh -c "nohup /bin/bash /data/kafka/bin/kafka-server-start.sh /data/kafka/config/server.properties >> /data/kafka/logs/kafka.out 2>&1 &"
