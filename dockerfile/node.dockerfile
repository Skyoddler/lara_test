FROM node:16

WORKDIR /var/www/html

COPY ./entrypoint/node_entrypoint.sh /root/entrypoint.sh

RUN chmod +x /root/entrypoint.sh

ENTRYPOINT ["/root/entrypoint.sh"]
