git add --all
git commit --all -m "automated updates"
git push origin staging
git checkout master
git merge staging
git push origin master
git checkout staging
