# 基础镜像系统版本为 CentOS:7
FROM openjdk:8

# 维护者信息
LABEL maintainer=""

# Docker 内用户切换到 root
USER root

# 设置时区为东八区
ENV TZ Asia/Shanghai
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime > /etc/timezone

# 设置目录
RUN mkdir -p /home/admin/canal-server/

# 上传 canal
COPY canal.deployer-1.1.7.tar.gz /home/admin/canal-server/

# 切换到 /home/admin/canal-server/ 目录下
WORKDIR /home/admin/canal-server/

# 解压 canal
RUN tar -zxvf canal.deployer-1.1.7.tar.gz
RUN rm -f canal.deployer-1.1.7.tar.gz



