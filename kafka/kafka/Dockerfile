# 基础镜像系统版本为 openjdk:8
FROM openjdk:8

# 维护者信息
LABEL maintainer=""

# Docker 内用户切换到 root
USER root

# 设置时区为东八区
ENV TZ Asia/Shanghai
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime > /etc/timezone

# 设置目录
RUN mkdir -p /data/

# 上传 kafka
COPY kafka_2.13-3.1.1.tgz /data/

# 切换到 /data/ 目录下
WORKDIR /data/

# 解压 kafka
RUN tar -zxvf kafka_2.13-3.1.1.tgz
RUN rm -f kafka_2.13-3.1.1.tgz

#重命名
RUN mv kafka_2.13-3.1.1 kafka

# 切换到 /data/kafka 目录下
WORKDIR /data/kafka



