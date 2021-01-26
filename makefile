
docker-build : 
	tar -czvf application/install/origins/data.tar.gz ./application/data
	tar -czvf application/install/origins/extra.tar.gz ./application/extra
	tar -czvf application/install/origins/upload.tar.gz ./upload
	tar -czvf application/install/origins/runtime.tar.gz ./runtime
	tar -czvf application/install/origins/static.tar.gz ./static
	tar -czvf application/install/origins/template.tar.gz ./template
	docker build --file .docker/php/Dockerfile -t ialaddin/maccms-docker:$$(git rev-parse --short HEAD) .;docker push ialaddin/maccms-docker:$$(git rev-parse --short HEAD)