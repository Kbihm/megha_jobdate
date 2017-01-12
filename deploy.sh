if [[ $TRAVIS_BRANCH == 'master' ]]
  ssh travis@app.jobdate.com.au
  cd /var/www/jobdate
  git pull
else if [[ $TRAVIS _BRANCH == 'dev' ]]
  ssh travis@dev.jobdate.com.au
  cd /var/www/jobdate
  git pull
fi