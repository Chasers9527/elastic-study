# Elastic Search 学习总结

> Elastic Search composer 包使用总结

使用 laradock 安装 ES 和 kibana

```shell
git clone https://github.com/laradock/laradock.git
cd laradock
# 如果想使用 6.3.2 的版本 
# 修改 kibana/Dockerfile 和 elasticserach/Dockerfile 中的 6.2.3 改为 6.3.2 即可
docker-compose up kibana elastic elasticsearch
```
现在就可以愉快地使用 es 和 kibana 了

使用前的准备工作：

* 安装好 elasicsearch 和 kibana
* 执行安装  composer
* cp access.log ./logs