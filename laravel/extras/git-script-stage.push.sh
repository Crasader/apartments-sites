git add --all
git commit -m "automated updates"
git checkout master
git merge staging
git push origin master
git checkout staging
