# 基础镜像系统版本为 CentOS:7
FROM datax_image

# 维护者信息
LABEL maintainer="zzz xaozhuge@163.com"

# 上传解压 datax-web
COPY datax-web-2.1.2.tar.gz /usr/local/
COPY bootstrap.properties /usr/local/

# 解压
WORKDIR /usr/local/
RUN tar -zxvf datax-web-2.1.2.tar.gz
RUN rm -f datax-web-2.1.2.tar.gz
WORKDIR /usr/local/datax-web-2.1.2
RUN ./bin/install.sh --force
RUN sed -i 's@PYTHON_PATH=@PYTHON_PATH=/usr/local/DataX/target/datax/datax/bin/datax.py@' /usr/local/datax-web-2.1.2/modules/datax-executor/bin/env.properties

# 配置数据库
RUN cp -f /usr/local/bootstrap.properties /usr/local/datax-web-2.1.2/modules/datax-admin/conf/bootstrap.properties

# 启动
RUN ./bin/start-all.sh

WORKDIR /usr/local/datax-web-2.1.2


