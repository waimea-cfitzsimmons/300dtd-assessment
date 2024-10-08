# Development of a Database-Driven Web Application for NCEA Level 3

Project Name: **Tabletop Character Index**

Project Author: **Cameron Fitzsimmons**

Assessment Standards: **91902** and **91903**


-------------------------------------------------

## Design, Development and Testing Log

### 16/05/2024

Created the first design of the database and how it would interlink

![First version of database](images/db1.png)

Figured out on how the database should be set up and interlink together. Got a basic idea of the layout of the website/ how it should function on a simple level.

### 17/05/2024

Making a flowchart using Excalidraw to decide the basic flow of the website

![Alt text](images/outline1.png)

I figured how the website should interlink and flow and decided that the user should start at a sign up/in page and then be sent to a main page where everything can be accessed from that page. I also decided that there will be two types of accounts a Player account who can make playable characters and view the campaign and npc information, and a game master who can create and add players too campaigns, make and manage npc's and view player character's information.


### 28/05/2024

Started creating a figma web design for how the website will function and how the UI will look on a basic level

![Alt text](images/figma1.png)

I started creating a figma web design for how the basic website will function in order to show the end users what kind of website it will be and how it will work. did not finish making it. 



### 31/05/2024

Finished first design of the figma version of the website

![Alt text](images/figma2.png)

Finished off the campaign part of the Figma design and also interaction between the pages using the flow prototypes.

### 11/06/2024

talked with end users and added colour scheme aswell as small changes.

I added a color scheme to the website aswell as made some changes based on user feedback. I also added a colour scheme to the website and experimented with various colour pallots.

![image](https://github.com/waimea-cfitzsimmons/300dtd-assessment/assets/158527099/b5abc9c2-df34-4f47-8ac3-3e2902610d47)


End users made several comments about the design of the website. They said that the text at the top of some of the screens was to small and that it made it look empty. They also commented that the welcome screen text was too cluttered. They also pointed out several small UI changes that should be made such as the pop out menu buttons overlapping on certain pages. 

I acted apon the user feedback by making the heading text larger and more centeral. I also changed the welcome page to only say "welcome". I also touched up smaller areas of the UI and added a backdrop to certain areas in order to make it less empty.

### 13/06/2024

Added a rough outline for how the database will connect

Each character will have a creator and each campaign will have a dm

![Alt text](images/database.png)

### 23/07/2024

Made prototype and refining it

Ran into problems with the UI design and how it all interacts. The UI was clunky and felt like a maze to navigate. User feedback also confirmed this. Main cause of problem is the transition from the character/campaign list to the users page.

![Alt text](images/old-layout.png)

### 02/08/2024

Got images working for the character profiles

Changed how the UI looks with two seperate sections for the list and the profile. Also added images to the characters. The Navigation is slightly better but still needs improvement. Currently the admin page has been moved to replace the list instead of the character profile 

![Alt text](images/images.png)

### 13/08/2024

Added back button and updated the character profile

enduser feedback spoke about how they would get 'trapped' on a profile or user page so I added a back button that will return the user to the character list and whatever profile they were looking at. Also updated the stats table by making it an actual table in order to make it look nicer. 

![Alt text](images/ui_improved.png)

### 15/08/2024

Enduser feedback on campaign page design.
End user commented on how it was annoying to have to go back to click on a different character in a campaign. I added a third pannel to the campaign view so that they can quickly browse through the character involved in a campaign.
![image](https://github.com/user-attachments/assets/361f9adb-6601-48c8-ab2c-f2e908e280e5)

-------------------------------------------------

# System testing

## HTML validation

Screenshots of validating the html of my website

![Alt text](images/errorchar.png)
For the character list page there are only warnings about lacking headings which are not required (The hidden messages are htmx)

![Alt text](images/errorcam.png)
Showing the HTML validating for the campaign page. Hidden messages are also HTMX or things relating to it.

## Database testing

Screenshots showing the website adding to the database. 

![Alt text](images/walt1.png)
database before adding character

![Alt text](images/walt2.png)
creating new character

![Alt text](images/walt3.png)
new character created

![Alt text](images/walt4.png)
character in database