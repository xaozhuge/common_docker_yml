#!/bin/bash
docker exec canal-server_c /bin/bash /home/admin/canal-server/bin/stop.sh
docker exec canal-server_c /bin/bash /home/admin/canal-server/bin/startup.sh