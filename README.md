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

      
Project is has two configurations. One for Vercel deployment, which uses /api folder in frontend, so you only need frontend if you want to use Vercel for deployment.  
Backend is for local development and uses server.js for email handling. We have contact form in page, so in local you can test thank you messages etc. with backend.  
Backend has server.js for controlling emails from the contact form. We use dotenv, so remember to create your own .env file where you can store your API_KEY and toher sensitive information. In this example we use SendGrid to handle emails.  
  
In the public folder we have usual index.html for our project, we have added folder for custom fonts. You can change them to your own liking.  
As structured, assets folder have images, videos and icons needed for the project.  
In component folder we have invidual components, like Rock Paper Scissors game. Components required .js and .css is in this folder.  
In section folder we have every section. They are named descriptive way, for example "About". Section has the section structure and component imports.  

Page stylesheets are are used in descending way. So App.css sets overall rules for the whole page's look. Sections own .css files have section specific styling and invidual component styling is found in each components .css-file.  
   

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
