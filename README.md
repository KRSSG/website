# Website repository for KRSSG, IIT Kharagpur

### To add a person in team page, create a pull request
- If you want to update profile image, upload an image [250 X 250] in ```/team/``` .
- Add following code snippet in ```/team.html```
```
  <div class="col-md-3 design_profile_box">
    <div class="row my-3">
      <img class="design_profile_img" src="./team/<File Name>" alt="Image">
    </div>
    <h3 class="text-center font-weight-bold "><Name></h3>
    <p class="text-center"><Team></p>
  </div>
```
For default profile image, replace ```<File Name>``` with ```profile.png```
