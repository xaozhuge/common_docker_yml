# 基础镜像系统版本为 CentOS:7
FROM centos:7

# 维护者信息
LABEL maintainer="zzz xaozhuge@163.com"

# Docker 内用户切换到 root
USER root

# 设置时区为东八区
ENV TZ Asia/Shanghai
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime > /etc/timezone

# 安装 Git 和 Wget
RUN yum -y install wget
RUN yum -y install git

# 上传解压 JDK maven DataX
COPY jdk-8u131-linux-x64.tar.gz /usr/local/
COPY apache-maven-3.6.3-bin.tar.gz /usr/local/
COPY DataX.tar.gz /usr/local/
COPY datax-web.tar.gz /usr/local/
COPY datax-web-2.1.2.tar.gz /usr/local/

# 切换到 /usr/local/ 目录下
WORKDIR /usr/local/

# 解压 JDK
RUN tar -zxvf jdk-8u131-linux-x64.tar.gz
RUN mv jdk1.8.0_131  jdk1.8
RUN rm -f jdk-8u131-linux-x64.tar.gz

# 解压 Maven
RUN tar -zxvf apache-maven-3.6.3-bin.tar.gz
RUN mv apache-maven-3.6.3 maven
RUN rm -f apache-maven-3.6.3-bin.tar.gz

# 添加容器内的永久环境变量
RUN sed -i "2 a export JAVA_HOME=/usr/local/jdk1.8" /etc/profile
RUN sed -i "3 a export PATH=\$PATH:\$JAVA_HOME/bin" /etc/profile
RUN sed -i "4 a export CLASSPATH=.:\$JAVA_HOME/lib/dt.jar:\$JAVA_HOME/lib/tools.jar" /etc/profile
RUN sed -i "5 a export MAVEN_HOME=/usr/local/maven" /etc/profile
RUN sed -i "6 a export PATH=\$PATH:\$MAVEN_HOME/bin" /etc/profile
RUN source /etc/profile
RUN sed -i '1 a source /etc/profile' ~/.bashrc
RUN source ~/.bashrc

# 添加构建用的临时环境变量
ENV JAVA_HOME /usr/local/jdk1.8
ENV PATH $PATH:$JAVA_HOME/bin
ENV CLASSPATH .:$JAVA_HOME/lib/dt.jar:$JAVA_HOME/lib/tools.jar
ENV MAVEN_HOME /usr/local/maven
ENV PATH $PATH:$MAVEN_HOME/bin

# 克隆并编译 DataX 的源码
WORKDIR /usr/local/
RUN tar -zxvf DataX.tar.gz
WORKDIR /usr/local/DataX/
RUN sed -i "s#<module>oscarwriter</module>#<!-- <module>oscarwriter</module> -->#" pom.xml
RUN mvn -U clean package assembly:assembly -Dmaven.test.skip=true


# 解压
WORKDIR /usr/local/
RUN tar -zxvf datax-web-2.1.2.tar.gz
WORKDIR /usr/local/datax-web-2.1.2
RUN ./bin/install.sh --force
RUN sed -i 's@PYTHON_PATH=@PYTHON_PATH=/usr/local/DataX/target/datax/datax/bin/datax.py@' /usr/local/datax-web-2.1.2/modules/datax-executor/bin/env.properties
RUN ./bin/start-all.sh






# 创建配置文件存放用文件夹
RUN mkdir /data
RUN cp /usr/local/DataX/target/datax/datax/job/job.json /data/
WORKDIR /data


