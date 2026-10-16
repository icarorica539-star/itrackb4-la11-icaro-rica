# ITRACKB4 Laboratory Activity 9

# F1. Which column did you make nullable, and why that one and not another?

I made the prerequisite column nullable because some subjects do not have prerequisites. I kept the other important columns required because they contain the basic information needed for each subject.


# F2. Which step failed first for you, and what did the error say?

The first problem I encountered was when I opened the subjects page. It showed the error View [subject.index] not found. I realized that the folder name in my code was incorrect. My file was inside the subjects folder, so I changed it to subjects.index, and the page worked.

# F3. You changed no Blade file in Part D, yet your pages still work. Why not?

The pages still worked because I only changed where the data came from. Before, the controller got the subjects from a JSON file. In Part D, I changed it to get the data from the database. Since the controller still passed the data to the Blade files using the same variable names and expected fields, I did not need to change the views.