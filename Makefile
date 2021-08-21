build:
	docker build -t mywise:latest .
run:
	docker run -d -p 80:80 --name m2 mywise:latest
runl:
	docker run -p 80:80 -v `pwd`/site-files:/site-files --name m3 mywise:latest
download:
	docker cp m2:/site-files .
	ls -R site-files
exec:
	docker exec -it m2 /bin/bash
execl:
	docker exec -it m3 /bin/bash
runa2:
	docker run -p 80:80 --name a2 php:apache
execa2:
	docker exec -it a2 /bin/bash
clean:
	docker rm $$(docker ps -a -q)
	rm -rf site-files
cleanall:
	docker rmi mywise:latest

#############

build:
	docker build -t myimage:latest .
run:
	docker run -d -p 80:80 --name m2 myimage:latest



