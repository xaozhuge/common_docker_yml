ARG CENTOS_VERSION
FROM ${CENTOS_VERSION}

ARG TZ

#参考文档 https://www.138vps.com/qtjc/2713.html
RUN yum install -y zlib-devel bzip2 bzip2-devel readline-devel sqlite sqlite-devel openssl-devel xz xz-devel libffi-devel wget tar zip gcc-c++ kernel-devel make
WORKDIR /usr/local
RUN wget http://npm.taobao.org/mirrors/python/3.8.0/Python-3.8.0.tgz
RUN tar -xzf Python-3.8.0.tgz
RUN mkdir python3
WORKDIR Python-3.8.0
RUN ./configure --prefix=/usr/local/python3
RUN make
RUN make install
RUN ln -s /usr/local/python3/bin/python3 /usr/bin/python3
RUN ln -s /usr/local/python3/bin/pip3 /usr/bin/pip3
WORKDIR /usr/local
RUN rm -rf Python-3.8.0.tgz  Python-3.8.0


