<div class="loginform">
  <div>
    <?php echo validation_errors(); ?>
    <?php echo $this->session->flashdata('success_msg'); ?>
    <?php echo form_open('http://127.0.0.1:4567/login_controller/signupform'); ?>
        <h1>Sign up</h1>
        <div class="form-group">
            <label for="InputActivity">Login</label>
            <input type="text" class="form-control" name="login" id="InputLogin" placeholder="Login">
        </div>

        <div class="form-group">
            <label for="InputTime">Password</label>
            <input type="text" class="form-control" name="password" id="InputPassword" placeholder="Password">
        </div>

            <button type="submit" class="btn btn-primary">Go</button> 
            
    </form>

    

  </div>
</div>