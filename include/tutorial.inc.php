<div class="modal fade" id="tutorial1" aria-hidden="true" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <img src="../assets/images/logo1.png" width="120px">
                    <h2>Welcome abroad, we are very excited to have you here with us.</h2>
                    <h5 class="text-muted">Before you get started, let's kick off with a bit of a tutorial to demonstrate how you should be using our app.</h5>
                    <a data-bs-target="#skip" data-bs-toggle="modal" class="link-danger" style="font-size: 20px;">Do not show this again.</a>
                </center>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#tutorial2" data-bs-toggle="modal">Proceed</button>
                <button class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="skip" aria-hidden="true" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <img src="../assets/images/logo1.png" width="120px">
                    <h2>Are you sure you want to stop seeing this tutorial?</h2>
                </center>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-bs-dismiss="modal" onclick="setTutModal()" style="padding-left: 20px; padding-right: 20px;">Yes</button>
                <button class="btn btn-primary" data-bs-target="#tutorial1" data-bs-toggle="modal">No, bring me back</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tutorial2" aria-hidden="true" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <img src="../assets/images/tutimg1.png" width="90%">
                    <h3>This is your dashboard, where everything is accessible at a glance.</h3>
                    <h5 class="text-muted">On this page, you will be able to add a new habit, set tasks into your to-do's, navigate around the application <br>and most importantly, interact with your selected pet.</h5>
                </center>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#tutorial3" data-bs-toggle="modal">Next</button>
                <button class="btn btn-dark" data-bs-target="#tutorial1" data-bs-toggle="modal">Back</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tutorial3" aria-hidden="true" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <img src="../assets/images/tutimg2.png" width="90%">
                    <h3>This is the stat header, where information of your equipped pet will be displayed.</h3>
                    <h5 class="text-muted">The <img src="../assets/images/level.png" width="10">Level indicates the level of your pet. The <img src="../assets/images/health.png" width="10"> health indicates the health points of your pet <br>and the <img src="../assets/images/happy.png" width="10"> happy indicates the happiness of your pet. <br>Lastly, the <img src="../assets/images/coin.png" width="10"> represents the amount of coins you have gained. </h5>
                    <h5 class="text-muted"> Earn coins & experience points by completing habits & tasks, <br>keep your pet happy by feeding it food you purchased. </h5>
                    <h5 class="text-muted"> At maximum happiness, your rewards received will gain a<span style="color: green"> massive</span> boost, so try making it your daily goal. </h5>
                    <h5 class="text-muted"> Please remember to <span style="color: red">take extra care</span> of your pet by avoiding bad habits as it could bring consequences. </h5>
                </center>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-target="#tutorial1" data-bs-toggle="modal" style="left: 10px; position: absolute;">Back to first</button>
                <button class="btn btn-primary" data-bs-target="#tutorial4" data-bs-toggle="modal">Next</button>
                <button class="btn btn-dark" data-bs-target="#tutorial2" data-bs-toggle="modal">Back</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tutorial4" aria-hidden="true" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <img src="../assets/images/tutimg3.png" width="90%">
                    <h3>Moving on, this is where you will be able to add in a new habit to keep up with.</h3>
                    <h5 class="text-muted">Do note that after entering a habit, you are required to select a nature of the habit (<span style="color: green;">Positive</span>/<span style="color: red;">Negative</span>) & its difficulty. </h5>
                    <h5 class="text-muted"> For every <span style="color: green;">positive</span> habits that you accomplish, you will earn some <img src="../assets/images/coin.png" width="10"> coins & some <img src="../assets/images/level.png" width="10"> experience points to level up.
                        <br>On the other hand, for each <span style="color: red;">negative</span> habits that you have done, your pet will lose some <img src="../assets/images/health.png" width="10"> health & some <img src="../assets/images/coin.png" width="10"> coins. </h5>
                </center>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-target="#tutorial1" data-bs-toggle="modal" style="left: 10px; position: absolute;">Back to first</button>
                <button class="btn btn-primary" data-bs-target="#tutorial5" data-bs-toggle="modal">Next</button>
                <button class="btn btn-dark" data-bs-target="#tutorial3" data-bs-toggle="modal">Back</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tutorial5" aria-hidden="true" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <img src="../assets/images/tutimg4.png" width="45%">
                    <h3>Similarly, your to-do's can be added here & each time you check off a task, <br>you will be rewarded with some <img src="../assets/images/coin.png" width="10"> coins & some <img src="../assets/images/level.png" width="10"> experience points.</h3>
                    <h5 class="text-muted">Other details such as due dates or descriptions can be edited by hovering over the task that have been added.</h5>
                </center>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-target="#tutorial1" data-bs-toggle="modal" style="left: 10px; position: absolute;">Back to first</button>
                <button class="btn btn-primary" data-bs-target="#tutorial6" data-bs-toggle="modal">Next</button>
                <button class="btn btn-dark" data-bs-target="#tutorial4" data-bs-toggle="modal">Back</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tutorial6" aria-hidden="true" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <img src="../assets/images/tutimg5.png" width="90%">
                    <h3>By accessing your inventory in the dashboard, <br>you will be able to check out your owned pets & wallpapers.</h3>
                    <h5 class="text-muted">These can be purchased from the <span style="color: #FFD700;">shop</span>, so gather up enough coins & find your favourite combination.</h5>
                </center>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-target="#tutorial1" data-bs-toggle="modal" style="left: 10px; position: absolute;">Back to first</button>
                <button class="btn btn-primary" data-bs-target="#tutorial7" data-bs-toggle="modal">Next</button>
                <button class="btn btn-dark" data-bs-target="#tutorial5" data-bs-toggle="modal">Back</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tutorial7" aria-hidden="true" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <img src="../assets/images/tutimg6.png" width="90%">
                    <h3>As previously mentioned, there is a happiness indicator in the stats header <br>& the way you can build this meter up is by <span style="color: green">feeding </span> your pet!</h3>
                    <h5 class="text-muted">Again, food can be purchased from the <span style="color: #FFD700;">shop</span>.</h5>
                </center>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-target="#tutorial1" data-bs-toggle="modal" style="left: 10px; position: absolute;">Back to first</button>
                <button class="btn btn-primary" data-bs-target="#tutorial8" data-bs-toggle="modal">Next</button>
                <button class="btn btn-dark" data-bs-target="#tutorial6" data-bs-toggle="modal">Back</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tutorial8" aria-hidden="true" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <img src="../assets/images/tutimg7.png" width="90%">
                    <h3>A studying feature is also included. </h3>
                    <h5 class="text-muted">It is recommended to start each session by setting a timer, and to take a break once the session is complete. <br>You can then repeat this cycle to enhance your productivity and focus</h5>
                    <h6 class="text-muted">Everytime you <span style="color: green">complete</span> a studying session, you will be rewarded with some <img src="../assets/images/coin.png" width="10"> coins to use at the shop.</h6>
                </center>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-target="#tutorial1" data-bs-toggle="modal" style="left: 10px; position: absolute;">Back to first</button>
                <button class="btn btn-primary" data-bs-target="#tutorial9" data-bs-toggle="modal">Next</button>
                <button class="btn btn-dark" data-bs-target="#tutorial7" data-bs-toggle="modal">Back</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tutorial9" aria-hidden="true" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <img src="../assets/images/logo1.png" width="120px">
                    <h3>You have reached the end of this tutorial.</h3>
                    <h6 class="text-muted">Start this <span style="color: green">positive</span> journey in building healthy habits & be in better control of your daily routine.</h6>
                    <h6 class="text-muted"><span style="color: green">Honesty</span> is the best quality when using our application & it helps you reach your goals.</h6>
                    <h6 class="text-muted">We hope you enjoy!</h6>
                </center>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-target="#tutorial1" data-bs-toggle="modal" style="left: 10px; position: absolute;">Back to first</button>
                <button class="btn btn-primary" data-bs-dismiss="modal" onclick="setTutModal()">Done</button>
            </div>
        </div>
    </div>
</div>