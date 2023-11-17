# wc-takehome
WooCommerce Junior Developer Take-Home Assignment

Custom WooCommerce theme with a minimalistic design and efficient user experience.
This repository showcases expertise in WooCommerce theme development, multi-language integration, Docker containerization, and version control using Git.

Objective
The primary goal of this project is to demonstrate proficiency in developing a custom WooCommerce theme. 
The theme includes features such as multi-language support, custom templates for product listing and single product details, and Docker containerization. 
The final solution is pushed to both a public Docker registry and a Git repository.

Features
Product Listing Page: Showcase all available products with relevant information.
Single Product Details Page: Provide detailed information about a selected product.
Multi-language Support

Docker Containerization
Containerize the entire solution using Docker. 
Ensure that the Dockerfile is well-documented and includes all the necessary instructions to build and run the application seamlessly.


Getting Started
Follow these steps to set up and run the project locally:

Clone the repository:
git clone https://github.com/miloradrajic/wc-takehome.git

Navigate to the project directory:
cd wc-takehome

Build and run the Docker container:
docker build -t wc-takehome .
docker run -p 8888:80 wc-takehome

Access the theme in your web browser at http://localhost:8888.

Contributing
Feel free to contribute by submitting issues or pull requests. Follow the project's contribution guidelines for a smooth collaboration process.

License
This project is licensed under the MIT License. See the LICENSE file for details.

Happy coding! 🚀