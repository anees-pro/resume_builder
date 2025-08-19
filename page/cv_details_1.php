<div class="container">
  <h3 class="my-3">Enter Your Details</h3>
<form method="post" action="<?=$action->helper->url('action/createresume')?>" class="border border-2 rounded-2 p-2 my-3">
<p class="fs-4"><i class="bi bi-person-circle"></i> Personal Details</p>

<div class="row justify-content-between">
  <div class=" col-6 mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
    <div class="">
      <input type="text" class="form-control" name="name" placeholder="Monu Giri" id="inputEmail3" required>
    </div>
  </div>
  <div class="col-6 mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Headline</label>
    <div class="">
      <input type="text" class="form-control" name="headline" placeholder="PHP Developer" id="inputEmail3" required>
    </div>
  </div>
</div>
  <div class="col mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Objective</label>
    <div class="">
      <textarea class="w-100" name="objective" required></textarea>
    </div>
  </div>
  <hr>
  <p class="fs-4"><i class="bi bi-person-lines-fill"></i> Contact Details</p>
  <div class="row justify-content-between">
  <div class="col-6 mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="">
      <input type="email" class="form-control" name="email" placeholder="whomonugiri@gmail.com" id="inputEmail3" required>
    </div>
  </div>
  <div class="col-6 mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Mobile</label>
    <div class="">
      <input type="mobile" class="form-control" name="mobile" placeholder="9898985652" id="inputEmail3" required>
    </div>
  </div>
</div>
  <div class="mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Address</label>
    <div class="">
      <input type="text" name="address" placeholder="New Delhi, India" class="form-control" id="inputEmail3" required>
    </div>
  </div>
  <hr>
  <div class="col-6 mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label fs-4"><i class="bi bi-tools"></i> Skills</label>
    <div id="skills">

    </div>
    <div class="input-group mb-3">
  <input type="text"  class="form-control" id="userskill" placeholder="HTML" aria-label="Example text with button addon" aria-describedby="button-addon1">

  <button class="btn btn-primary" type="button" id="addskill">Add Skill</button>
</div>
  </div>
  <hr>
  <div class="mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label fs-4 "><i class="bi bi-book-half"></i> Education</label>
    <div id="educations" class="">
     
</div>
    <div class="d-flex gap-2">
      <input type="text" class="form-control" id="college" placeholder="Delhi University, New Delhi">
      <input type="text" class="form-control" id="course" placeholder="Bachelor In Computer Application">
      <input type="text" class="form-control" id="e_duration" placeholder="2018-2021">
      <button type="button" class="btn btn-primary" id="addeducation">Add</button>
    </div>
  </div>
 <hr>
 <div class="mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label fs-4"><i class="bi bi-briefcase-fill"></i> Experience</label>
    <div id="exps" class="">
     
</div>
    <div class="d-flex gap-2">
      <input type="text" class="form-control" id="company" placeholder="Google">
      <input type="text" class="form-control" id="jobrole" placeholder="Graphic Designer" >
      <input type="text" class="form-control" id="w_duration" placeholder="2018-2021" >
      

    </div>
    <span class="d-block mt-2">About Your Work</span>
    <textarea id="work_desc" class="w-100 mb-2"></textarea>
<button type="button" class="btn btn-primary" id="addexp">Add</button>
  </div>
  <button type="submit" class="btn btn-warning"><i class="bi bi-box2"></i> Create Resume</button>
</form>
</div>