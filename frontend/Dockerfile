FROM node:24-alpine

WORKDIR /app

COPY . .

# Install dependencies
RUN npm install

EXPOSE 5173

# Starting app
CMD ["npm", "run", "dev", "--", "--host"]