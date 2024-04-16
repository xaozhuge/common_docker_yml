
1. kafka版本 3.1.1
https://archive.apache.org/dist/kafka/3.1.1/kafka_2.13-3.1.1.tgz

2. 常用命令
查看log
docker logs kafka_c
进入容器
name=kafka_c;docker exec -it $name /bin/sh;
查看topic
docker exec kafka_c sh -c "cd /data/kafka/bin; ./kafka-topics.sh --list --bootstrap-server 173.16.0.238:9092"
创建topic
docker exec kafka_c sh -c "cd /data/kafka/bin; ./kafka-topics.sh --bootstrap-server 173.16.0.238:9092 --create --topic temp_zzz"
仅消费正在写入的消息
docker exec kafka_c sh -c "cd /data/kafka/bin; ./kafka-console-consumer.sh --bootstrap-server 173.16.0.238:9092 --topic temp_zzz"
从开始位置消费
docker exec kafka_c sh -c "cd /data/kafka/bin; ./kafka-console-consumer.sh --bootstrap-server 173.16.0.238:9092 --from-beginning --topic temp_zzz" > temp.log
查看所有消费组详情
docker exec kafka_c sh -c "cd /data/kafka/bin; ./kafka-consumer-groups.sh --bootstrap-server 173.16.0.238:9092 --describe --all-groups"


