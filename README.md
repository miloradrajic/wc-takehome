# WC-Takehome
## WooCommerce Junior Developer Take-Home Assignment

Custom WooCommerce theme with a minimalistic design and efficient user experience.
This repository showcases expertise in WooCommerce theme development, multi-language integration, Docker containerization, and version control using Git.

## Objective
The primary goal of this project is to demonstrate proficiency in developing a custom WooCommerce theme. 
The theme includes features such as multi-language support, custom templates for product listing and single product details, and Docker containerization. 
The final solution is pushed to both a public Docker registry and a Git repository.

## Features
WooCommerce Compatibility: Unlock the full potential of your online store with seamless integration of WooCommerce.
Polylang Integration: Reach a broader audience by effortlessly translating your website content into multiple languages with Polylang. WC-Takehome is fully compatible with Polylang, allowing you to create a multilingual website with ease.
Responsive Design: WC-Takehome is built with a mobile-first approach, ensuring that your website looks stunning on devices of all sizes. Whether your visitors are on desktops, tablets, or smartphones, they will enjoy a seamless and responsive browsing experience.
Product Listing Page: Showcase all available products with relevant information.
Single Product Details Page: Provide detailed information about a selected product.
One step checkout

## Getting Started
Follow these steps to set up and run the project locally:

- Navigate to the project directory:
cd wc-takehome

- Build and run the Docker container:
docker pull mrajic/wc-takehome
docker run -d -p 8888:80 wc-takehome

Alternatively, a simple Dockerfile and docker-compose.yml files can be used to generate a new image that includes the necessary content (which is a much cleaner solution than the bind mount above and edit files inside of the running container):

``` docker
# Use an official WordPress image as the base image
FROM wordpress:latest

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy your WordPress files into the container
COPY . .

# Set proper ownership for Apache
RUN chown -R www-data:www-data /var/www/html

# Install MySQL client
RUN apt-get update && \
    apt-get install -y default-mysql-client

# Install WP-CLI
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && \
    chmod +x wp-cli.phar && \
    mv wp-cli.phar /usr/local/bin/wp

ENV WORDPRESS_DB_NAME=wordpress \
    WORDPRESS_DB_USER=wordpress \
    WORDPRESS_DB_PASSWORD=password

# Expose the necessary port
EXPOSE 8888

# Enable live updates during development
RUN rm -rf /var/www/html/*

# Start the Apache server
CMD ["apache2-foreground"]
```

docker-compose.yml file
``` docker-compose
version: '3'

services:
  db:
    image: mysql:latest
    restart: always
    environment:
      MYSQL_ROOT_PASSWORD: password
      MYSQL_DATABASE: wordpress
      MYSQL_USER: wordpress
      MYSQL_PASSWORD: password
    ports:
      - "3333:3333"
    volumes:
      - db_data:/var/lib/mysql
    networks:
      - wordpress

  wordpress:
    build:
      context: .
    depends_on:
      - db
    image: wordpress:latest
    restart: always
    ports:
      - "8888:80"
    environment:
      WORDPRESS_DB_HOST: db:3306
      WORDPRESS_DB_USER: wordpress
      WORDPRESS_DB_PASSWORD: password
      WORDPRESS_DB_NAME: wordpress
    volumes:
      - ./wordpress:/var/www/html
    networks:
      - wordpress

volumes:
  wordpress:
  db_data:

networks:
   wordpress:
```
After creating these 2 files in working directory, run command
`docker compose up -d`

- Navigate to theme folder 
cd wordpress/wp-content/themes

- Clone the repository:
git clone https://github.com/miloradrajic/wc-takehome.git

- Access the theme in your web browser at http://localhost:8888.

## Wordpress Installation

- WordPress: Make sure you have WordPress installed on your server.
- WooCommerce and Polylang: Install and activate the WooCommerce and Polylang plugins.
- Theme Installation: Activate WC-Takehome theme through the WordPress admin panel.
- Customization: Navigate to the theme customization settings to personalize the look and feel of your website.
- Start Selling: Begin setting up your products with WooCommerce and reach a wider audience by configuring your website in multiple languages using Polylang.


## Contributing
Feel free to contribute by submitting issues or pull requests. Follow the project's contribution guidelines for a smooth collaboration process.

## License
This project is licensed under the MIT License. See the LICENSE file for details.

## Happy coding! 🚀