CONTENTS OF THIS FILE

* Specific ThinkShout Questions
* Introduction
* Requirements
* Installation
* Configuration
* Maintainers


SPECIFIC THINKSHOUT QUESTIONS
1. What was the goal and what were the requirements?
The goal of this code is to aggregate data from the Engage platform into an end-point for display in Drupal. The requirements were to incorporate the newly purchased Engage platform into the already custom developed Drupal calendar for Kent State University.   
2. How does the work meet (or not meet) the goal and requirements?
This module fully met that requirements and implementated a seemless solution for the President's office to include the new calendar system. 
3. How does it work? (big picture: think about how you would describe this to someone who was going to review the code or add functionality, to get them started)
The code is a plug and play custom developed Drupal module that works with Drupal core and Drupal events to feed Engage platform events into Drupal. 
4. Who did you work on this with, and which parts were you responsible for? (If there is no commit or ticket history to review, please be very explicit here)
This code was created by me and my team at Kent State University. I was responsible for the architecture of the code and the review of the code. 
5. If you were to do it again, what would you do differently? OR If you could spend more time, what would you add/improve?
I would architect it in a way to not pull events into Drupal, but rather use Drupal's caching system to house the events and have it updated as needed to keep the data out of the Drupal database. 
6. How do I run this code on my own web server so I can try it out?
The rest of this readme file explains the steps to run this code. 


INTRODUCTION

The Student Organization Engage Calendar module aggregates data from the Engage 
platform into an end-point for display in Drupal. This module is currently 
available for Drupal 7.x.

This module can be used in conjunction with other modules to bring data into 
Drupal events. 


REQUIREMENTS

This module requires no modules outside of Drupal core.

INSTALLATION

Install the module as you would normally install a contributed
Drupal module. Visit https://www.drupal.org/node/1897420 for further
information.

CONFIGURATION

1. Enable the module and then configure at admin/config/engage/orgs.

Configurable parameters:

Change the API key used to communicate to the correct Engage platform end-point.


MAINTAINERS

Scott Stillisano (sstillis) - https://www.drupal.org/u/sstillis

