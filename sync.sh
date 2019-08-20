echo 'Pulling from the Github (ORIGIN)'
git fetch

echo 'Fetch Success! Continue to the Pushing'

echo 'Adding all unstaged files'
git add .

echo 'Enter the commit message:'
read commitMessage

git commit -m "$commitMessage"

echo 'Pushing to the Github (Origin)'
git push origin

echo 'Pushing to the Azure DevOps (mirror)'
git push --mirror azure

read
