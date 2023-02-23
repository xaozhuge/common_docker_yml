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

RUN mkdir /usr/local/ytdlp
WORKDIR /usr/local/ytdlp

#这里默认使用提供的2023.02.17的yt-dlp，可以直接访问github的话，也可以使用github的链接
#RUN wget  https://github.com/yt-dlp/yt-dlp/releases/latest/download/yt-dlp
COPY ./asset/yt-dlp /usr/local/ytdlp
RUN chmod 777 yt-dlp
RUN ln -s /usr/local/ytdlp/yt-dlp /usr/bin/yt-dlp

#Linux 参考文档 https://cloud.tencent.com/developer/article/1985211
RUN yum install -y epel-release
RUN rpm -v --import http://li.nux.ro/download/nux/RPM-GPG-KEY-nux.ro
RUN rpm -Uvh http://li.nux.ro/download/nux/dextop/el7/x86_64/nux-dextop-release-0-5.el7.nux.noarch.rpm
RUN yum install -y ffmpeg ffmpeg-devel


