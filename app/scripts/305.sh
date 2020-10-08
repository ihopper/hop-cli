#!/bin/bash

# Text Color Codes
BLUE="\033[0;34m"
LCYAN="\033[1;36m"
CYAN="\033[0;36m"
RED="\033[0;31m"
YELLOW="\033[1;33m"
NC="\033[0m"

# Progress bar
function progress_bar() {
    counter=1
    while [ $counter -le 30 ]
    do 
        echo -n "."
        sleep 0.03
        ((counter++))
    done
}

echo -e "${RED}THE PROJECT IS DOOMED! DELETING ALL THE THINGS..."
sleep 0.5
echo -ne "${LCYAN}  Removing useless comments..."
progress_bar
echo -e "${YELLOW}[done]"
sleep 0.5
echo -ne "${LCYAN}  Deleting files..."
progress_bar
echo -e "${YELLOW}[done]"
sleep 0.5
echo -ne "${LCYAN}  Munging personal data..."
progress_bar
echo -e "${YELLOW}[done]"
sleep 0.5
echo -ne "${LCYAN}  Destroying backups..."
progress_bar
echo -e "${YELLOW}[done]"
sleep 0.5
echo -ne "${LCYAN}  Fixing a drink..."
progress_bar
echo -e "${YELLOW}[done]"
sleep 0.5
echo -ne "${LCYAN}  Making a toast..."
progress_bar
echo -e "${YELLOW}[done]"
sleep 0.5
echo -ne "${LCYAN}  Applying for unemployment..."
progress_bar
echo -e "${YELLOW}[done]"
echo -e "${LCYAN}=================================================================="
sleep 0.5
echo -e "${LCYAN}Balance has been restored!\n"