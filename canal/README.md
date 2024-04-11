1. 选择自制镜像
https://hub.docker.com/r/canal/canal-server/tags
1.1.7版本异常 https://github.com/alibaba/canal/issues/4975
1.1.6版本异常 
这里选择选择 openjdk:8，部署 canal-server 的 1.1.7版本
https://github.com/alibaba/canal/releases/download/canal-1.1.7/canal.deployer-1.1.7.tar.gz

2. 常用命令
查看log
docker logs canal-server_c
进入容器
name=canal-server_c;docker exec -it $name /bin/sh;
容器内启动canal
/bin/bash /home/admin/canal-server/bin/startup.sh
容器内关闭canal
/bin/bash /home/admin/canal-server/bin/stop.sh
容器外启动canal
docker exec canal-server_c /bin/bash /home/admin/canal-server/bin/startup.sh
容器外关闭canal
docker exec canal-server_c /bin/bash /home/admin/canal-server/bin/stop.sh

