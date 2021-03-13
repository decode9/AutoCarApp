FROM node:12.18-alpine

RUN mkdir /autocar

WORKDIR /autocar

COPY ./package*.json /autocar

RUN yarn

VOLUME [ "/autocar" ]

EXPOSE 3000

CMD [ "yarn", "dev" ]