<!-- Improved compatibility of back to top link: See: https://github.com/othneildrew/Best-README-Template/pull/73 -->
<a name="readme-top"></a>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

This is Wordpress plugin to add custom courses in wordpress as custom post. It uses taxonomies and meta-boxes for attributes.  
It also includes script for using Wordpress Media Library for custom thumbnail image if you prefer it instead of Wordpress builtin thumbnail.  
It also has base for json import for course details, but remember to adjust code accordingly. The categories can be displayed within page via shortcode.  
More about structure and usage on section  
<a href="#usage">Usage</a>.





### Built With

* [![Wordpress][Wordpress]][Wordpress-url]
<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started

For getting this project started, you need to have Wordpress site  
or installed Wordpress locally.  


### Installation

1. Download the repo
 
2. Copy the content to wp-content/plugins  

3. Activate the plugin from Wordpress admin panel
   
<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- USAGE EXAMPLES -->
## Usage

This project can be used as a starting point, or template to your own portfolio.  
Folder structure:  
└── Course management tool/  
&nbsp;&nbsp;&nbsp;&nbsp;├── css  
&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;  └── pluginstyles.css  
&nbsp;&nbsp;&nbsp;&nbsp;├── javascript  
&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;  └── imageHandler.js    
&nbsp;&nbsp;&nbsp;&nbsp;├── includes/  
&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;  └── categories-shortcode.php  
&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;  └── custom-post-types.php  
&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;  └── fetch-json.php  
&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;  └── meta-boxes.php  
&nbsp;&nbsp;&nbsp;&nbsp;│ &nbsp;&nbsp;  └── taxonomies.php  
&nbsp;&nbsp;&nbsp;&nbsp;└── src/  
&nbsp;&nbsp;├── course-management-tool.php  
&nbsp;&nbsp;├── index.php  

      
Project consists of main file course-management-tool.php, additional files for other functions, css and Javascript. index.php is for first line of security so the code can´t be accessed via usual url.  

The course-manamegement-tool.php has file includes, queries for css and Javascript and registration hooks. It also has flushes because we are working with permalinks.  

The pluginstyles.css has some standard initial styling, but modify it to your projects needs.  

The imageHandler.js is for using wordpress built in media library for custom course thumbnail. For default post types uses wordpress builtin post thumbnail.  
You can also use images vie url by uncommenting function for it from meta-boxes.php  

The /includes folder has files for configuring taxonomies, custom posts and meta-boxes for your liking. Categories shortcode is for displaying categories in pages.  
For future reference the category shortcode could be also done as Gutenberg block for even easier usage.  

The fetch-json.php is starting point for getting course information from external .json-file. When you are importing files from external .json-file, follow these steps:  

  1. Fetching the JSON Data  
You can use WordPress's HTTP API to fetch data from an external source. The wp_remote_get function is commonly used for this purpose.  
  
2. Processing the JSON Data  
Once you fetch the JSON data, you'll need to parse it and iterate over the items to either create new posts or update existing ones.  
  
3. Creating or Updating Posts  
For each item in the JSON data, check if a post with the same 'id' already exists in your WordPress database. If it does, update it; if not, create a new post.  
  
4. Scheduling Regular Updates  
Consider using WordPress Cron (a time-based job scheduler in WP) to regularly fetch and update your data.  
     
 
   
<p align="right">(<a href="#readme-top">back to top</a>)</p>  


<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- CONTACT -->
## Contact

Niko Röytiö - roytioniko@gmail.com  
Project Link: <a href="https://github.com/nikoroytio/Course-Management-Tool">HERE</a>

<p align="right">(<a href="#readme-top">back to top</a>)</p>


<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[Wordpress]: https://img.shields.io/badge/Wordpress-21759B?style=for-the-badge&logo=wordpress&logoColor=white  
[Wordpress-url]: https://wordpress.com/  
