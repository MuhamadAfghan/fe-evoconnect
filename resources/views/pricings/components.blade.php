@extends('layouts.templates')

@section('content')
      <div class="bg-white py-5">
         <div class="container">
            <div class="row">
               <div class="col-md-3">
                  <div class="mb-3 border rounded list-sidebar overflow-hidden">
                     <div class="box-title p-3 border-bottom">
                        <h6 class="m-0">Components</h6>
                     </div>
                     <ul class="list-group list-group-flush">
                        <li>
                           <a class="p-3 d-inline-block w-100 border-bottom text-muted" href="#Alerts">Alerts</a>
                        </li>
                        <li>
                           <a class="p-3 d-inline-block w-100 border-bottom text-muted" href="#Badges">Badges</a>
                        </li>
                        <li>
                           <a class="p-3 d-inline-block w-100 border-bottom text-muted" href="#Breadcrumb">Breadcrumb</a>
                        </li>
                        <li>
                           <a class="p-3 d-inline-block w-100 border-bottom text-muted" href="#Buttons">Buttons</a>
                        </li>
                        <li>
                           <a class="p-3 d-inline-block w-100 border-bottom text-muted" href="#Button-group
                              ">Button group
                           </a>
                        </li>
                        <li>
                           <a class="p-3 d-inline-block w-100 border-bottom text-muted" href="#Cards">Cards</a>
                        </li>
                        <li>
                           <a class="p-3 d-inline-block w-100 border-bottom text-muted" href="#Collapse">Collapse</a>
                        </li>
                        <li>
                           <a class="p-3 d-inline-block w-100 border-bottom text-muted" href="#Dropdowns">Dropdowns</a>
                        </li>
                        <li>
                           <a class="p-3 d-inline-block w-100 border-bottom text-muted" href="#Forms">Forms</a>
                        </li>
                        <li>
                           <a class="p-3 d-inline-block w-100 border-bottom text-muted" href="#Input-group
                              ">Input group
                           </a>
                        </li>
                        <li>
                           <a class="p-3 d-inline-block w-100 border-bottom text-muted" href="#Jumbotron">Jumbotron</a>
                        </li>
                        <li>
                           <a class="p-3 d-inline-block w-100 border-bottom text-muted" href="#Modal">Modal</a>
                        </li>
                        <li>
                           <a class="p-3 d-inline-block w-100 border-bottom text-muted" href="#List-group
                              ">List group
                           </a>
                        </li>
                        <li>
                           <a class="p-3 d-inline-block w-100 border-bottom text-muted" href="#Navs">Navs</a>
                        </li>
                        <li>
                           <a class="p-3 d-inline-block w-100 border-bottom text-muted" href="#Navbar">Navbar</a>
                        </li>
                        <li>
                           <a class="p-3 d-inline-block w-100 border-bottom text-muted" href="#Pagination">Pagination</a>
                        </li>
                        <li>
                           <a class="p-3 d-inline-block w-100 border-bottom text-muted" href="#Progress">Progress</a>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="col-md-9">
                  <div id="Alerts" class="pb-5 mb-5 border-bottom">
                     <h2 class="h5">Alerts</h2>
                     <div class="alert alert-primary" role="alert">
                        This is a primary alert—check it out!
                     </div>
                     <div class="alert alert-secondary" role="alert">
                        This is a secondary alert—check it out!
                     </div>
                     <div class="alert alert-success" role="alert">
                        This is a success alert—check it out!
                     </div>
                     <div class="alert alert-danger" role="alert">
                        This is a danger alert—check it out!
                     </div>
                     <div class="alert alert-warning" role="alert">
                        This is a warning alert—check it out!
                     </div>
                     <div class="alert alert-info" role="alert">
                        This is a info alert—check it out!
                     </div>
                     <div class="alert alert-light" role="alert">
                        This is a light alert—check it out!
                     </div>
                     <div class="alert alert-dark" role="alert">
                        This is a dark alert—check it out!
                     </div>
                     <div class="alert alert-primary" role="alert">
                        This is a primary alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
                     </div>
                     <div class="alert alert-secondary" role="alert">
                        This is a secondary alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
                     </div>
                     <div class="alert alert-success" role="alert">
                        This is a success alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
                     </div>
                     <div class="alert alert-danger" role="alert">
                        This is a danger alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
                     </div>
                     <div class="alert alert-warning" role="alert">
                        This is a warning alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
                     </div>
                     <div class="alert alert-info" role="alert">
                        This is a info alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
                     </div>
                     <div class="alert alert-light" role="alert">
                        This is a light alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
                     </div>
                     <div class="alert alert-dark" role="alert">
                        This is a dark alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you like.
                     </div>
                     <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Well done!</h4>
                        <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                        <hr>
                        <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                     </div>
                     <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                  </div>
                  <div id="Badges" class="pb-5 mb-5 border-bottom">
                     <h2 class="h5">Badges</h2>
                     <h1>Example heading <span class="badge badge-secondary">New</span></h1>
                     <h2>Example heading <span class="badge badge-secondary">New</span></h2>
                     <h3>Example heading <span class="badge badge-secondary">New</span></h3>
                     <h4>Example heading <span class="badge badge-secondary">New</span></h4>
                     <h5>Example heading <span class="badge badge-secondary">New</span></h5>
                     <h6>Example heading <span class="badge badge-secondary">New</span></h6>
                     <button type="button" class="btn btn-primary">
                     Notifications <span class="badge badge-light">4</span>
                     </button>
                     <button type="button" class="btn btn-primary">
                     Profile <span class="badge badge-light">9</span>
                     <span class="sr-only">unread messages</span>
                     </button>
                     <span class="badge badge-primary">Primary</span>
                     <span class="badge badge-secondary">Secondary</span>
                     <span class="badge badge-success">Success</span>
                     <span class="badge badge-danger">Danger</span>
                     <span class="badge badge-warning">Warning</span>
                     <span class="badge badge-info">Info</span>
                     <span class="badge badge-light">Light</span>
                     <span class="badge badge-dark">Dark</span>
                     <span class="badge badge-primary">Primary</span>
                     <span class="badge badge-secondary">Secondary</span>
                     <span class="badge badge-success">Success</span>
                     <span class="badge badge-danger">Danger</span>
                     <span class="badge badge-warning">Warning</span>
                     <span class="badge badge-info">Info</span>
                     <span class="badge badge-light">Light</span>
                     <span class="badge badge-dark">Dark</span>
                     <a href="#" class="badge badge-primary">Primary</a>
                     <a href="#" class="badge badge-secondary">Secondary</a>
                     <a href="#" class="badge badge-success">Success</a>
                     <a href="#" class="badge badge-danger">Danger</a>
                     <a href="#" class="badge badge-warning">Warning</a>
                     <a href="#" class="badge badge-info">Info</a>
                     <a href="#" class="badge badge-light">Light</a>
                     <a href="#" class="badge badge-dark">Dark</a>
                     <hr>
                      <span class="badge badge-pill badge-primary">Primary</span>
                      <span class="badge badge-pill badge-secondary">Secondary</span>
                      <span class="badge badge-pill badge-success">Success</span>
                      <span class="badge badge-pill badge-danger">Danger</span>
                      <span class="badge badge-pill badge-warning">Warning</span>
                      <span class="badge badge-pill badge-info">Info</span>
                      <span class="badge badge-pill badge-light">Light</span>
                      <span class="badge badge-pill badge-dark">Dark</span>
                  </div>
                  <div id="Breadcrumb" class="pb-5 mb-5 border-bottom">
                     <h2 class="h5">Breadcrumb</h2>
                     <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item active" aria-current="page">Home</li>
                        </ol>
                     </nav>
                     <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Library</li>
                        </ol>
                     </nav>
                     <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="#">Home</a></li>
                           <li class="breadcrumb-item"><a href="#">Library</a></li>
                           <li class="breadcrumb-item active" aria-current="page">Data</li>
                        </ol>
                     </nav>
                  </div>
                  <div id="Buttons" class="pb-5 mb-5 border-bottom">
                     <h2 class="h5">Buttons</h2>
                     <button type="button" class="btn btn-primary">Primary</button>
                     <button type="button" class="btn btn-secondary">Secondary</button>
                     <button type="button" class="btn btn-success">Success</button>
                     <button type="button" class="btn btn-danger">Danger</button>
                     <button type="button" class="btn btn-warning">Warning</button>
                     <button type="button" class="btn btn-info">Info</button>
                     <button type="button" class="btn btn-light">Light</button>
                     <button type="button" class="btn btn-dark">Dark</button>
                     <button type="button" class="btn btn-link">Link</button>
                     <hr>
                     <a class="btn btn-primary" href="#" role="button">Link</a>
                     <button class="btn btn-primary" type="submit">Button</button>
                     <input class="btn btn-primary" type="button" value="Input">
                     <input class="btn btn-primary" type="submit" value="Submit">
                     <input class="btn btn-primary" type="reset" value="Reset">
                     <hr>
                     <button type="button" class="btn btn-outline-primary">Primary</button>
                     <button type="button" class="btn btn-outline-secondary">Secondary</button>
                     <button type="button" class="btn btn-outline-success">Success</button>
                     <button type="button" class="btn btn-outline-danger">Danger</button>
                     <button type="button" class="btn btn-outline-warning">Warning</button>
                     <button type="button" class="btn btn-outline-info">Info</button>
                     <button type="button" class="btn btn-outline-light">Light</button>
                     <button type="button" class="btn btn-outline-dark">Dark</button>
                     <hr>
                     <button type="button" class="btn btn-primary btn-lg">Large button</button>
                     <button type="button" class="btn btn-secondary btn-lg">Large button</button>
                     <hr>
                     <button type="button" class="btn btn-primary btn-sm">Small button</button>
                     <button type="button" class="btn btn-secondary btn-sm">Small button</button>
                     <hr>
                     <button type="button" class="btn btn-primary btn-lg btn-block">Block level button</button>
                     <button type="button" class="btn btn-secondary btn-lg btn-block">Block level button</button>
                     <hr>
                     <button type="button" class="btn btn-lg btn-primary" disabled>Primary button</button>
                     <button type="button" class="btn btn-secondary btn-lg" disabled>Button</button>
                     <hr>
                     <a href="#" class="btn btn-primary btn-lg disabled" role="button" aria-disabled="true">Primary link</a>
                     <a href="#" class="btn btn-secondary btn-lg disabled" role="button" aria-disabled="true">Link</a>
                     <hr>
                     <div class="btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                        <input type="checkbox" checked autocomplete="off"> Checked
                        </label>
                     </div>
                     <hr>
                     <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                        <input type="radio" name="options" id="option1" autocomplete="off" checked> Active
                        </label>
                        <label class="btn btn-secondary">
                        <input type="radio" name="options" id="option2" autocomplete="off"> Radio
                        </label>
                        <label class="btn btn-secondary">
                        <input type="radio" name="options" id="option3" autocomplete="off"> Radio
                        </label>
                     </div>
                  </div>
                  <div id="Button-group" class="pb-5 mb-5 border-bottom">
                     <h2 class="h5">Button group</h2>
                     <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-secondary">Left</button>
                        <button type="button" class="btn btn-secondary">Middle</button>
                        <button type="button" class="btn btn-secondary">Right</button>
                     </div>
                     <hr>
                     <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-2" role="group" aria-label="First group">
                           <button type="button" class="btn btn-secondary">1</button>
                           <button type="button" class="btn btn-secondary">2</button>
                           <button type="button" class="btn btn-secondary">3</button>
                           <button type="button" class="btn btn-secondary">4</button>
                        </div>
                        <div class="btn-group mr-2" role="group" aria-label="Second group">
                           <button type="button" class="btn btn-secondary">5</button>
                           <button type="button" class="btn btn-secondary">6</button>
                           <button type="button" class="btn btn-secondary">7</button>
                        </div>
                        <div class="btn-group" role="group" aria-label="Third group">
                           <button type="button" class="btn btn-secondary">8</button>
                        </div>
                     </div>
                     <hr>
                     <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group mr-2" role="group" aria-label="First group">
                           <button type="button" class="btn btn-secondary">1</button>
                           <button type="button" class="btn btn-secondary">2</button>
                           <button type="button" class="btn btn-secondary">3</button>
                           <button type="button" class="btn btn-secondary">4</button>
                        </div>
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <div class="input-group-text" id="btnGroupAddon">@</div>
                           </div>
                           <input type="text" class="form-control" placeholder="Input group example" aria-label="Input group example" aria-describedby="btnGroupAddon">
                        </div>
                     </div>
                     <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group" role="group" aria-label="First group">
                           <button type="button" class="btn btn-secondary">1</button>
                           <button type="button" class="btn btn-secondary">2</button>
                           <button type="button" class="btn btn-secondary">3</button>
                           <button type="button" class="btn btn-secondary">4</button>
                        </div>
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <div class="input-group-text" id="btnGroupAddon2">@</div>
                           </div>
                           <input type="text" class="form-control" placeholder="Input group example" aria-label="Input group example" aria-describedby="btnGroupAddon2">
                        </div>
                     </div>
                     <hr>
                     <div class="bd-example">
                        <div class="btn-group btn-group-lg" role="group" aria-label="Large button group">
                           <button type="button" class="btn btn-secondary">Left</button>
                           <button type="button" class="btn btn-secondary">Middle</button>
                           <button type="button" class="btn btn-secondary">Right</button>
                        </div>
                        <br>
                        <div class="btn-group my-3" role="group" aria-label="Default button group">
                           <button type="button" class="btn btn-secondary">Left</button>
                           <button type="button" class="btn btn-secondary">Middle</button>
                           <button type="button" class="btn btn-secondary">Right</button>
                        </div>
                        <br>
                        <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                           <button type="button" class="btn btn-secondary">Left</button>
                           <button type="button" class="btn btn-secondary">Middle</button>
                           <button type="button" class="btn btn-secondary">Right</button>
                        </div>
                     </div>
                     <hr>
                     <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                        <button type="button" class="btn btn-secondary">1</button>
                        <button type="button" class="btn btn-secondary">2</button>
                        <div class="btn-group" role="group">
                           <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Dropdown
                           </button>
                           <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                              <a class="dropdown-item" href="#">Dropdown link</a>
                              <a class="dropdown-item" href="#">Dropdown link</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div id="Cards" class="pb-5 mb-5 border-bottom">
                     <h2 class="h5">Cards</h2>
                     <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="img/job1.png" alt="Card image cap">
                        <div class="card-body">
                           <h5 class="card-title">Card title</h5>
                           <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                           <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                     </div>
                     <hr>
                     <div class="card" style="width: 18rem;">
                        <div class="card-body">
                           <h5 class="card-title">Card title</h5>
                           <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                           <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                           <a href="#" class="card-link">Card link</a>
                           <a href="#" class="card-link">Another link</a>
                        </div>
                     </div>
                     <hr>
                     <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="img/job1.png" alt="Card image cap">
                        <div class="card-body">
                           <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                     </div>
                     <hr>
                     <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="img/job1.png" alt="Card image cap">
                        <div class="card-body">
                           <h5 class="card-title">Card title</h5>
                           <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                           <li class="list-group-item">Cras justo odio</li>
                           <li class="list-group-item">Dapibus ac facilisis in</li>
                           <li class="list-group-item">Vestibulum at eros</li>
                        </ul>
                        <div class="card-body">
                           <a href="#" class="card-link">Card link</a>
                           <a href="#" class="card-link">Another link</a>
                        </div>
                     </div>
                     <hr>
                     <div class="row">
                        <div class="col-sm-6">
                           <div class="card">
                              <div class="card-body">
                                 <h5 class="card-title">Special title treatment</h5>
                                 <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                 <a href="#" class="btn btn-primary">Go somewhere</a>
                              </div>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="card">
                              <div class="card-body">
                                 <h5 class="card-title">Special title treatment</h5>
                                 <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                 <a href="#" class="btn btn-primary">Go somewhere</a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <div class="card" style="width: 18rem;">
                        <div class="card-body">
                           <h5 class="card-title">Special title treatment</h5>
                           <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                           <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                     </div>
                     <div class="card text-center" style="width: 18rem;">
                        <div class="card-body">
                           <h5 class="card-title">Special title treatment</h5>
                           <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                           <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                     </div>
                     <div class="card text-right" style="width: 18rem;">
                        <div class="card-body">
                           <h5 class="card-title">Special title treatment</h5>
                           <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                           <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                     </div>
                     <hr>
                     <div class="card text-center">
                        <div class="card-header">
                           <ul class="nav nav-tabs card-header-tabs">
                              <li class="nav-item">
                                 <a class="nav-link active" href="#">Active</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#">Link</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link disabled" href="#">Disabled</a>
                              </li>
                           </ul>
                        </div>
                        <div class="card-body">
                           <h5 class="card-title">Special title treatment</h5>
                           <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                           <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                     </div>
                     <hr>
                     <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                        <div class="card-header">Header</div>
                        <div class="card-body">
                           <h5 class="card-title">Primary card title</h5>
                           <p class="card-text text-white">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                     </div>
                     <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                        <div class="card-header">Header</div>
                        <div class="card-body">
                           <h5 class="card-title">Secondary card title</h5>
                           <p class="card-text text-white">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                     </div>
                     <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                        <div class="card-header">Header</div>
                        <div class="card-body">
                           <h5 class="card-title">Success card title</h5>
                           <p class="card-text text-white">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                     </div>
                     <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                        <div class="card-header">Header</div>
                        <div class="card-body">
                           <h5 class="card-title">Danger card title</h5>
                           <p class="card-text text-white">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                     </div>
                     <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                        <div class="card-header">Header</div>
                        <div class="card-body">
                           <h5 class="card-title">Warning card title</h5>
                           <p class="card-text text-white">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                     </div>
                     <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                        <div class="card-header">Header</div>
                        <div class="card-body">
                           <h5 class="card-title">Info card title</h5>
                           <p class="card-text text-white">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                     </div>
                     <div class="card bg-light mb-3" style="max-width: 18rem;">
                        <div class="card-header">Header</div>
                        <div class="card-body">
                           <h5 class="card-title">Light card title</h5>
                           <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                     </div>
                     <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                        <div class="card-header">Header</div>
                        <div class="card-body">
                           <h5 class="card-title">Dark card title</h5>
                           <p class="card-text text-white">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                     </div>
                     <hr>
                     <div class="card-group">
                        <div class="card">
                           <img class="card-img-top" src="img/job1.png" alt="Card image cap">
                           <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                           </div>
                        </div>
                        <div class="card">
                           <img class="card-img-top" src="img/job1.png" alt="Card image cap">
                           <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                           </div>
                        </div>
                        <div class="card">
                           <img class="card-img-top" src="img/job1.png" alt="Card image cap">
                           <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <div class="card-group">
                        <div class="card">
                           <img class="card-img-top" src="img/job1.png" alt="Card image cap">
                           <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                           </div>
                           <div class="card-footer">
                              <small class="text-muted">Last updated 3 mins ago</small>
                           </div>
                        </div>
                        <div class="card">
                           <img class="card-img-top" src="img/job1.png" alt="Card image cap">
                           <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                           </div>
                           <div class="card-footer">
                              <small class="text-muted">Last updated 3 mins ago</small>
                           </div>
                        </div>
                        <div class="card">
                           <img class="card-img-top" src="img/job1.png" alt="Card image cap">
                           <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                           </div>
                           <div class="card-footer">
                              <small class="text-muted">Last updated 3 mins ago</small>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <div class="card-columns">
                        <div class="card">
                           <img class="card-img-top" src="img/job1.png" alt="Card image cap">
                           <div class="card-body">
                              <h5 class="card-title">Card title that wraps to a new line</h5>
                              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                           </div>
                        </div>
                        <div class="card p-3">
                           <blockquote class="blockquote mb-0 card-body">
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                              <footer class="blockquote-footer">
                                 <small class="text-muted">
                                 Someone famous in <cite title="Source Title">Source Title</cite>
                                 </small>
                              </footer>
                           </blockquote>
                        </div>
                        <div class="card">
                           <img class="card-img-top" src="img/job1.png" alt="Card image cap">
                           <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                           </div>
                        </div>
                        <div class="card bg-primary text-white text-center p-3">
                           <blockquote class="blockquote mb-0">
                              <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.</p>
                              <footer class="blockquote-footer text-white">
                                 <small>
                                 Someone famous in <cite title="Source Title">Source Title</cite>
                                 </small>
                              </footer>
                           </blockquote>
                        </div>
                        <div class="card text-center">
                           <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                           </div>
                        </div>
                        <div class="card p-3 text-right">
                           <blockquote class="blockquote mb-0">
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                              <footer class="blockquote-footer">
                                 <small class="text-muted">
                                 Someone famous in <cite title="Source Title">Source Title</cite>
                                 </small>
                              </footer>
                           </blockquote>
                        </div>
                        <div class="card">
                           <div class="card-body">
                              <h5 class="card-title">Card title</h5>
                              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div id="Collapse" class="pb-5 mb-5 border-bottom">
                     <h2 class="h5">Collapse</h2>
                     <p>
                        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Link with href
                        </a>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Button with data-target
                        </button>
                     </p>
                     <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                           Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                        </div>
                     </div>
                     <hr>
                     <p>
                        <a class="btn btn-primary" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Toggle first element</a>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Toggle second element</button>
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Toggle both elements</button>
                     </p>
                     <div class="row">
                        <div class="col">
                           <div class="collapse multi-collapse" id="multiCollapseExample1">
                              <div class="card card-body">
                                 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                              </div>
                           </div>
                        </div>
                        <div class="col">
                           <div class="collapse multi-collapse" id="multiCollapseExample2">
                              <div class="card card-body">
                                 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                              </div>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <div id="accordion">
                        <div class="card">
                           <div class="card-header" id="headingOne">
                              <h5 class="mb-0">
                                 <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                 Collapsible Group Item #1
                                 </button>
                              </h5>
                           </div>
                           <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                              <div class="card-body">
                                 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                              </div>
                           </div>
                        </div>
                        <div class="card">
                           <div class="card-header" id="headingTwo">
                              <h5 class="mb-0">
                                 <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                 Collapsible Group Item #2
                                 </button>
                              </h5>
                           </div>
                           <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                              <div class="card-body">
                                 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                              </div>
                           </div>
                        </div>
                        <div class="card">
                           <div class="card-header" id="headingThree">
                              <h5 class="mb-0">
                                 <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                 Collapsible Group Item #3
                                 </button>
                              </h5>
                           </div>
                           <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                              <div class="card-body">
                                 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div id="Dropdowns" class="pb-5 mb-5 border-bottom">
                     <h2 class="h5">Dropdowns</h2>
                     <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown button
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                           <a class="dropdown-item" href="#">Action</a>
                           <a class="dropdown-item" href="#">Another action</a>
                           <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                     </div>
                     <hr>
                     <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown link
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                           <a class="dropdown-item" href="#">Action</a>
                           <a class="dropdown-item" href="#">Another action</a>
                           <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                     </div>
                     <hr>
                     <!-- Example single danger button -->
                     <div class="btn-group">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                        </button>
                        <div class="dropdown-menu">
                           <a class="dropdown-item" href="#">Action</a>
                           <a class="dropdown-item" href="#">Another action</a>
                           <a class="dropdown-item" href="#">Something else here</a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                     </div>
                     <hr>
                     <!-- Example split danger button -->
                     <div class="btn-group">
                        <button type="button" class="btn btn-danger">Action</button>
                        <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                           <a class="dropdown-item" href="#">Action</a>
                           <a class="dropdown-item" href="#">Another action</a>
                           <a class="dropdown-item" href="#">Something else here</a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                     </div>
                     <hr>
                     <!-- Large button groups (default and split) -->
                     <div class="btn-group">
                        <button class="btn btn-secondary btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Large button
                        </button>
                        <div class="dropdown-menu">
                           ...
                        </div>
                     </div>
                     <div class="btn-group">
                        <button class="btn btn-secondary btn-lg" type="button">
                        Large split button
                        </button>
                        <button type="button" class="btn btn-lg btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                           ...
                        </div>
                     </div>
                     <!-- Small button groups (default and split) -->
                     <div class="btn-group">
                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Small button
                        </button>
                        <div class="dropdown-menu">
                           <a class="dropdown-item" href="#">Action</a>
                           <a class="dropdown-item" href="#">Another action</a>
                           <a class="dropdown-item" href="#">Something else here</a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                     </div>
                     <div class="btn-group">
                        <button class="btn btn-secondary btn-sm" type="button">
                        Small split button
                        </button>
                        <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                           <a class="dropdown-item" href="#">Action</a>
                           <a class="dropdown-item" href="#">Another action</a>
                           <a class="dropdown-item" href="#">Something else here</a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                     </div>
                     <hr>
                     <!-- Default dropright button -->
                     <div class="btn-group dropright">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropright
                        </button>
                        <div class="dropdown-menu">
                           <a class="dropdown-item" href="#">Action</a>
                           <a class="dropdown-item" href="#">Another action</a>
                           <a class="dropdown-item" href="#">Something else here</a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                     </div>
                     <!-- Split dropright button -->
                     <div class="btn-group dropright">
                        <button type="button" class="btn btn-secondary">
                        Split dropright
                        </button>
                        <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropright</span>
                        </button>
                        <div class="dropdown-menu">
                           <h6 class="dropdown-header">Dropdown header</h6>
                           <a class="dropdown-item" href="#">Action</a>
                           <a class="dropdown-item" href="#">Another action</a>
                        </div>
                     </div>
                     <hr>
                     <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                           <button class="dropdown-item" type="button">Action</button>
                           <button class="dropdown-item" type="button">Another action</button>
                           <button class="dropdown-item" type="button">Something else here</button>
                        </div>
                     </div>
                     <hr>
                     <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Right-aligned menu
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                           <button class="dropdown-item" type="button">Action</button>
                           <button class="dropdown-item" type="button">Another action</button>
                           <button class="dropdown-item" type="button">Something else here</button>
                        </div>
                     </div>
                     <hr>
                     <div class="border">
                        <form class="px-4 py-3">
                           <div class="form-group">
                              <label for="exampleDropdownFormEmail1">Email address</label>
                              <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com">
                           </div>
                           <div class="form-group">
                              <label for="exampleDropdownFormPassword1">Password</label>
                              <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">
                           </div>
                           <div class="form-check mb-3">
                              <input type="checkbox" class="form-check-input" id="dropdownCheck">
                              <label class="form-check-label" for="dropdownCheck">
                              Remember me
                              </label>
                           </div>
                           <button type="submit" class="btn btn-primary">Sign in</button>
                        </form>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">New around here? Sign up</a>
                        <a class="dropdown-item" href="#">Forgot password?</a>
                     </div>
                     <hr>
                     <form class="border p-4">
                        <div class="form-group">
                           <label for="exampleDropdownFormEmail2">Email address</label>
                           <input type="email" class="form-control" id="exampleDropdownFormEmail2" placeholder="email@example.com">
                        </div>
                        <div class="form-group">
                           <label for="exampleDropdownFormPassword2">Password</label>
                           <input type="password" class="form-control" id="exampleDropdownFormPassword2" placeholder="Password">
                        </div>
                        <div class="form-check mb-3">
                           <input type="checkbox" class="form-check-input" id="dropdownCheck2">
                           <label class="form-check-label" for="dropdownCheck2">
                           Remember me
                           </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign in</button>
                     </form>
                  </div>
                  <div id="Forms" class="pb-5 mb-5 border-bottom">
                     <h2 class="h5">Forms</h2>
                     <form>
                        <div class="form-group">
                           <label for="exampleInputEmail1">Email address</label>
                           <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                           <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                           <label for="exampleInputPassword1">Password</label>
                           <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-check mb-3">
                           <input type="checkbox" class="form-check-input" id="exampleCheck1">
                           <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                     </form>
                     <hr>
                     <form>
                        <div class="form-group">
                           <label for="exampleFormControlInput1">Email address</label>
                           <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        <div class="form-group">
                           <label for="exampleFormControlSelect1">Example select</label>
                           <select class="form-control" id="exampleFormControlSelect1">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <label for="exampleFormControlSelect2">Example multiple select</label>
                           <select multiple class="form-control" id="exampleFormControlSelect2">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <label for="exampleFormControlTextarea1">Example textarea</label>
                           <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                     </form>
                     <hr>
                     <input class="form-control form-control-lg" type="text" placeholder=".form-control-lg">
                     <input class="form-control" type="text" placeholder="Default input">
                     <input class="form-control form-control-sm" type="text" placeholder=".form-control-sm">
                     <hr>
                     <select class="form-control form-control-lg">
                        <option>Large select</option>
                     </select>
                     <select class="form-control">
                        <option>Default select</option>
                     </select>
                     <select class="form-control form-control-sm">
                        <option>Small select</option>
                     </select>
                     <hr>
                     <input class="form-control" type="text" placeholder="Readonly input here…" readonly>
                     <hr>
                     <form>
                        <div class="form-group row">
                           <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                           <div class="col-sm-10">
                              <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                           <div class="col-sm-10">
                              <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                           </div>
                        </div>
                     </form>
                     <hr>
                     <form class="form-inline">
                        <div class="form-group mb-2">
                           <label for="staticEmail2" class="sr-only">Email</label>
                           <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="email@example.com">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                           <label for="inputPassword2" class="sr-only">Password</label>
                           <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                     </form>
                     <hr>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                        Default checkbox
                        </label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" disabled>
                        <label class="form-check-label" for="defaultCheck2">
                        Disabled checkbox
                        </label>
                     </div>
                     <hr>
                     <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                        Default radio
                        </label>
                     </div>
                     <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                        Second default radio
                        </label>
                     </div>
                     <div class="form-check disabled">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" disabled>
                        <label class="form-check-label" for="exampleRadios3">
                        Disabled radio
                        </label>
                     </div>
                     <hr>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">1</label>
                     </div>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                        <label class="form-check-label" for="inlineCheckbox2">2</label>
                     </div>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" disabled>
                        <label class="form-check-label" for="inlineCheckbox3">3 (disabled)</label>
                     </div>
                     <hr>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                        <label class="form-check-label" for="inlineRadio1">1</label>
                     </div>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">2</label>
                     </div>
                     <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" disabled>
                        <label class="form-check-label" for="inlineRadio3">3 (disabled)</label>
                     </div>
                     <hr>
                     <form>
                        <div class="form-group">
                           <label for="formGroupExampleInput">Example label</label>
                           <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                        </div>
                        <div class="form-group">
                           <label for="formGroupExampleInput2">Another label</label>
                           <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                        </div>
                     </form>
                     <hr>
                     <form>
                        <div class="row">
                           <div class="col">
                              <input type="text" class="form-control" placeholder="First name">
                           </div>
                           <div class="col">
                              <input type="text" class="form-control" placeholder="Last name">
                           </div>
                        </div>
                     </form>
                     <hr>
                     <form>
                        <div class="form-row">
                           <div class="col">
                              <input type="text" class="form-control" placeholder="First name">
                           </div>
                           <div class="col">
                              <input type="text" class="form-control" placeholder="Last name">
                           </div>
                        </div>
                     </form>
                     <hr>
                     <form>
                        <div class="form-row">
                           <div class="form-group col-md-6">
                              <label for="inputEmail4">Email</label>
                              <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                           </div>
                           <div class="form-group col-md-6">
                              <label for="inputPassword4">Password</label>
                              <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="inputAddress">Address</label>
                           <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                           <label for="inputAddress2">Address 2</label>
                           <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="form-row">
                           <div class="form-group col-md-6">
                              <label for="inputCity">City</label>
                              <input type="text" class="form-control" id="inputCity">
                           </div>
                           <div class="form-group col-md-4">
                              <label for="inputState">State</label>
                              <select id="inputState" class="form-control">
                                 <option selected>Choose...</option>
                                 <option>...</option>
                              </select>
                           </div>
                           <div class="form-group col-md-2">
                              <label for="inputZip">Zip</label>
                              <input type="text" class="form-control" id="inputZip">
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" id="gridCheck">
                              <label class="form-check-label" for="gridCheck">
                              Check me out
                              </label>
                           </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign in</button>
                     </form>
                     <hr>
                     <form>
                        <div class="form-group row">
                           <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                           <div class="col-sm-10">
                              <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                           <div class="col-sm-10">
                              <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                           </div>
                        </div>
                        <fieldset class="form-group">
                           <div class="row">
                              <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                              <div class="col-sm-10">
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                    <label class="form-check-label" for="gridRadios1">
                                    First radio
                                    </label>
                                 </div>
                                 <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                    <label class="form-check-label" for="gridRadios2">
                                    Second radio
                                    </label>
                                 </div>
                                 <div class="form-check disabled">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
                                    <label class="form-check-label" for="gridRadios3">
                                    Third disabled radio
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </fieldset>
                        <div class="form-group row">
                           <div class="col-sm-2">Checkbox</div>
                           <div class="col-sm-10">
                              <div class="form-check">
                                 <input class="form-check-input" type="checkbox" id="gridCheck1">
                                 <label class="form-check-label" for="gridCheck1">
                                 Example checkbox
                                 </label>
                              </div>
                           </div>
                        </div>
                        <div class="form-group row">
                           <div class="col-sm-10">
                              <button type="submit" class="btn btn-primary">Sign in</button>
                           </div>
                        </div>
                     </form>
                     <hr>
                     <form>
                        <div class="form-group row">
                           <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
                           <div class="col-sm-10">
                              <input type="email" class="form-control form-control-sm" id="colFormLabelSm" placeholder="col-form-label-sm">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="colFormLabel" class="col-sm-2 col-form-label">Email</label>
                           <div class="col-sm-10">
                              <input type="email" class="form-control" id="colFormLabel" placeholder="col-form-label">
                           </div>
                        </div>
                        <div class="form-group row">
                           <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Email</label>
                           <div class="col-sm-10">
                              <input type="email" class="form-control form-control-lg" id="colFormLabelLg" placeholder="col-form-label-lg">
                           </div>
                        </div>
                     </form>
                     <hr>
                     <form>
                        <div class="form-row">
                           <div class="col-7">
                              <input type="text" class="form-control" placeholder="City">
                           </div>
                           <div class="col">
                              <input type="text" class="form-control" placeholder="State">
                           </div>
                           <div class="col">
                              <input type="text" class="form-control" placeholder="Zip">
                           </div>
                        </div>
                     </form>
                     <hr>
                     <form>
                        <div class="form-row align-items-center">
                           <div class="col-auto">
                              <label class="sr-only" for="inlineFormInput">Name</label>
                              <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Jane Doe">
                           </div>
                           <div class="col-auto">
                              <label class="sr-only" for="inlineFormInputGroup">Username</label>
                              <div class="input-group mb-2">
                                 <div class="input-group-prepend">
                                    <div class="input-group-text">@</div>
                                 </div>
                                 <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username">
                              </div>
                           </div>
                           <div class="col-auto">
                              <div class="form-check mb-2">
                                 <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                                 <label class="form-check-label" for="autoSizingCheck">
                                 Remember me
                                 </label>
                              </div>
                           </div>
                           <div class="col-auto">
                              <button type="submit" class="btn btn-primary mb-2">Submit</button>
                           </div>
                        </div>
                     </form>
                     <hr>
                     <form>
                        <div class="form-row align-items-center">
                           <div class="col-sm-3 my-1">
                              <label class="sr-only" for="inlineFormInputName">Name</label>
                              <input type="text" class="form-control" id="inlineFormInputName" placeholder="Jane Doe">
                           </div>
                           <div class="col-sm-3 my-1">
                              <label class="sr-only" for="inlineFormInputGroupUsername">Username</label>
                              <div class="input-group">
                                 <div class="input-group-prepend">
                                    <div class="input-group-text">@</div>
                                 </div>
                                 <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Username">
                              </div>
                           </div>
                           <div class="col-auto my-1">
                              <div class="form-check">
                                 <input class="form-check-input" type="checkbox" id="autoSizingCheck2">
                                 <label class="form-check-label" for="autoSizingCheck2">
                                 Remember me
                                 </label>
                              </div>
                           </div>
                           <div class="col-auto my-1">
                              <button type="submit" class="btn btn-primary">Submit</button>
                           </div>
                        </div>
                     </form>
                     <hr>
                     <form>
                        <div class="form-row align-items-center">
                           <div class="col-auto my-1">
                              <label class="mr-sm-2" for="inlineFormCustomSelect">Preference</label>
                              <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                 <option selected>Choose...</option>
                                 <option value="1">One</option>
                                 <option value="2">Two</option>
                                 <option value="3">Three</option>
                              </select>
                           </div>
                           <div class="col-auto my-1">
                              <div class="custom-control custom-checkbox mr-sm-2">
                                 <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                 <label class="custom-control-label" for="customControlAutosizing">Remember my preference</label>
                              </div>
                           </div>
                           <div class="col-auto my-1">
                              <button type="submit" class="btn btn-primary">Submit</button>
                           </div>
                        </div>
                     </form>
                     <hr>
                     <form class="form-inline">
                        <label class="sr-only" for="inlineFormInputName2">Name</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Jane Doe">
                        <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                        <div class="input-group mb-2 mr-sm-2">
                           <div class="input-group-prepend">
                              <div class="input-group-text">@</div>
                           </div>
                           <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="Username">
                        </div>
                        <div class="form-check mb-2 mr-sm-2">
                           <input class="form-check-input" type="checkbox" id="inlineFormCheck">
                           <label class="form-check-label" for="inlineFormCheck">
                           Remember me
                           </label>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Submit</button>
                     </form>
                     <hr>
                     <form class="form-inline">
                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Preference</label>
                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                           <option selected>Choose...</option>
                           <option value="1">One</option>
                           <option value="2">Two</option>
                           <option value="3">Three</option>
                        </select>
                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                           <input type="checkbox" class="custom-control-input" id="customControlInline">
                           <label class="custom-control-label" for="customControlInline">Remember my preference</label>
                        </div>
                        <button type="submit" class="btn btn-primary my-1">Submit</button>
                     </form>
                     <hr>
                     <form>
                        <div class="form-row align-items-center">
                           <div class="col-auto my-1">
                              <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                              <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                 <option selected>Choose...</option>
                                 <option value="1">One</option>
                                 <option value="2">Two</option>
                                 <option value="3">Three</option>
                              </select>
                           </div>
                           <div class="col-auto my-1">
                              <div class="custom-control custom-checkbox mr-sm-2">
                                 <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                 <label class="custom-control-label" for="customControlAutosizing">Remember my preference</label>
                              </div>
                           </div>
                           <div class="col-auto my-1">
                              <button type="submit" class="btn btn-primary">Submit</button>
                           </div>
                        </div>
                     </form>
                     <hr>
                     <label for="inputPassword5">Password</label>
                     <input type="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
                     <small id="passwordHelpBlock" class="form-text text-muted">
                     Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                     </small>
                     <hr>
                     <form class="form-inline">
                        <div class="form-group">
                           <label for="inputPassword6">Password</label>
                           <input type="password" id="inputPassword6" class="form-control mx-sm-3" aria-describedby="passwordHelpInline">
                           <small id="passwordHelpInline" class="text-muted">
                           Must be 8-20 characters long.
                           </small>
                        </div>
                     </form>
                     <hr>
                     <form>
                        <fieldset disabled>
                           <div class="form-group">
                              <label for="disabledTextInput">Disabled input</label>
                              <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input">
                           </div>
                           <div class="form-group">
                              <label for="disabledSelect">Disabled select menu</label>
                              <select id="disabledSelect" class="form-control">
                                 <option>Disabled select</option>
                              </select>
                           </div>
                           <div class="form-group">
                              <div class="form-check">
                                 <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck" disabled>
                                 <label class="form-check-label" for="disabledFieldsetCheck">
                                 Can't check this
                                 </label>
                              </div>
                           </div>
                           <button type="submit" class="btn btn-primary">Submit</button>
                        </fieldset>
                     </form>
                     <hr>
                     <form class="needs-validation" novalidate>
                        <div class="form-row">
                           <div class="col-md-4 mb-3">
                              <label for="validationCustom01">First name</label>
                              <input type="text" class="form-control" id="validationCustom01" value="Mark" required>
                              <div class="valid-feedback">
                                 Looks good!
                              </div>
                           </div>
                           <div class="col-md-4 mb-3">
                              <label for="validationCustom02">Last name</label>
                              <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
                              <div class="valid-feedback">
                                 Looks good!
                              </div>
                           </div>
                           <div class="col-md-4 mb-3">
                              <label for="validationCustomUsername">Username</label>
                              <div class="input-group">
                                 <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                 </div>
                                 <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                                 <div class="invalid-feedback">
                                    Please choose a username.
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="col-md-6 mb-3">
                              <label for="validationCustom03">City</label>
                              <input type="text" class="form-control" id="validationCustom03" required>
                              <div class="invalid-feedback">
                                 Please provide a valid city.
                              </div>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label for="validationCustom04">State</label>
                              <select class="custom-select" id="validationCustom04" required>
                                 <option selected disabled value="">Choose...</option>
                                 <option>...</option>
                              </select>
                              <div class="invalid-feedback">
                                 Please select a valid state.
                              </div>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label for="validationCustom05">Zip</label>
                              <input type="text" class="form-control" id="validationCustom05" required>
                              <div class="invalid-feedback">
                                 Please provide a valid zip.
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                              <label class="form-check-label" for="invalidCheck">
                              Agree to terms and conditions
                              </label>
                              <div class="invalid-feedback">
                                 You must agree before submitting.
                              </div>
                           </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit form</button>
                     </form>
                     <script>
                        // Example starter JavaScript for disabling form submissions if there are invalid fields
                        (function() {
                          'use strict';
                          window.addEventListener('load', function() {
                            // Fetch all the forms we want to apply custom Bootstrap validation styles to
                            var forms = document.getElementsByClassName('needs-validation');
                            // Loop over them and prevent submission
                            var validation = Array.prototype.filter.call(forms, function(form) {
                              form.addEventListener('submit', function(event) {
                                if (form.checkValidity() === false) {
                                  event.preventDefault();
                                  event.stopPropagation();
                                }
                                form.classList.add('was-validated');
                              }, false);
                            });
                          }, false);
                        })();
                     </script>
                     <hr>
                     <form>
                        <div class="form-row">
                           <div class="col-md-4 mb-3">
                              <label for="validationServer01">First name</label>
                              <input type="text" class="form-control is-valid" id="validationServer01" value="Mark" required>
                              <div class="valid-feedback">
                                 Looks good!
                              </div>
                           </div>
                           <div class="col-md-4 mb-3">
                              <label for="validationServer02">Last name</label>
                              <input type="text" class="form-control is-valid" id="validationServer02" value="Otto" required>
                              <div class="valid-feedback">
                                 Looks good!
                              </div>
                           </div>
                           <div class="col-md-4 mb-3">
                              <label for="validationServerUsername">Username</label>
                              <div class="input-group">
                                 <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend3">@</span>
                                 </div>
                                 <input type="text" class="form-control is-invalid" id="validationServerUsername" aria-describedby="inputGroupPrepend3" required>
                                 <div class="invalid-feedback">
                                    Please choose a username.
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="col-md-6 mb-3">
                              <label for="validationServer03">City</label>
                              <input type="text" class="form-control is-invalid" id="validationServer03" required>
                              <div class="invalid-feedback">
                                 Please provide a valid city.
                              </div>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label for="validationServer04">State</label>
                              <select class="custom-select is-invalid" id="validationServer04" required>
                                 <option selected disabled value="">Choose...</option>
                                 <option>...</option>
                              </select>
                              <div class="invalid-feedback">
                                 Please select a valid state.
                              </div>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label for="validationServer05">Zip</label>
                              <input type="text" class="form-control is-invalid" id="validationServer05" required>
                              <div class="invalid-feedback">
                                 Please provide a valid zip.
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="form-check">
                              <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" required>
                              <label class="form-check-label" for="invalidCheck3">
                              Agree to terms and conditions
                              </label>
                              <div class="invalid-feedback">
                                 You must agree before submitting.
                              </div>
                           </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit form</button>
                     </form>
                     <hr>
                     <form class="was-validated">
                        <div class="mb-3">
                           <label for="validationTextarea">Textarea</label>
                           <textarea class="form-control is-invalid" id="validationTextarea" placeholder="Required example textarea" required></textarea>
                           <div class="invalid-feedback">
                              Please enter a message in the textarea.
                           </div>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                           <input type="checkbox" class="custom-control-input" id="customControlValidation1" required>
                           <label class="custom-control-label" for="customControlValidation1">Check this custom checkbox</label>
                           <div class="invalid-feedback">Example invalid feedback text</div>
                        </div>
                        <div class="custom-control custom-radio">
                           <input type="radio" class="custom-control-input" id="customControlValidation2" name="radio-stacked" required>
                           <label class="custom-control-label" for="customControlValidation2">Toggle this custom radio</label>
                        </div>
                        <div class="custom-control custom-radio mb-3">
                           <input type="radio" class="custom-control-input" id="customControlValidation3" name="radio-stacked" required>
                           <label class="custom-control-label" for="customControlValidation3">Or toggle this other custom radio</label>
                           <div class="invalid-feedback">More example invalid feedback text</div>
                        </div>
                        <div class="form-group">
                           <select class="custom-select" required>
                              <option value="">Open this select menu</option>
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                           </select>
                           <div class="invalid-feedback">Example invalid custom select feedback</div>
                        </div>
                        <div class="custom-file">
                           <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                           <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                           <div class="invalid-feedback">Example invalid custom file feedback</div>
                        </div>
                     </form>
                     <hr>
                     <form class="needs-validation" novalidate>
                        <div class="form-row">
                           <div class="col-md-4 mb-3">
                              <label for="validationTooltip01">First name</label>
                              <input type="text" class="form-control" id="validationTooltip01" value="Mark" required>
                              <div class="valid-tooltip">
                                 Looks good!
                              </div>
                           </div>
                           <div class="col-md-4 mb-3">
                              <label for="validationTooltip02">Last name</label>
                              <input type="text" class="form-control" id="validationTooltip02" value="Otto" required>
                              <div class="valid-tooltip">
                                 Looks good!
                              </div>
                           </div>
                           <div class="col-md-4 mb-3">
                              <label for="validationTooltipUsername">Username</label>
                              <div class="input-group">
                                 <div class="input-group-prepend">
                                    <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                                 </div>
                                 <input type="text" class="form-control" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" required>
                                 <div class="invalid-tooltip">
                                    Please choose a unique and valid username.
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="col-md-6 mb-3">
                              <label for="validationTooltip03">City</label>
                              <input type="text" class="form-control" id="validationTooltip03" required>
                              <div class="invalid-tooltip">
                                 Please provide a valid city.
                              </div>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label for="validationTooltip04">State</label>
                              <select class="custom-select" id="validationTooltip04" required>
                                 <option selected disabled value="">Choose...</option>
                                 <option>...</option>
                              </select>
                              <div class="invalid-tooltip">
                                 Please select a valid state.
                              </div>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label for="validationTooltip05">Zip</label>
                              <input type="text" class="form-control" id="validationTooltip05" required>
                              <div class="invalid-tooltip">
                                 Please provide a valid zip.
                              </div>
                           </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit form</button>
                     </form>
                     <form class="needs-validation was-validated" novalidate="">
                        <div class="form-row">
                           <div class="col-md-4 mb-3">
                              <label for="validationTooltip01">First name</label>
                              <input type="text" class="form-control" id="validationTooltip01" value="Mark" required="">
                              <div class="valid-tooltip">
                                 Looks good!
                              </div>
                           </div>
                           <div class="col-md-4 mb-3">
                              <label for="validationTooltip02">Last name</label>
                              <input type="text" class="form-control" id="validationTooltip02" value="Otto" required="">
                              <div class="valid-tooltip">
                                 Looks good!
                              </div>
                           </div>
                           <div class="col-md-4 mb-3">
                              <label for="validationTooltipUsername">Username</label>
                              <div class="input-group">
                                 <div class="input-group-prepend">
                                    <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                                 </div>
                                 <input type="text" class="form-control" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" required="">
                                 <div class="invalid-tooltip">
                                    Please choose a unique and valid username.
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-row">
                           <div class="col-md-6 mb-3">
                              <label for="validationTooltip03">City</label>
                              <input type="text" class="form-control" id="validationTooltip03" required="">
                              <div class="invalid-tooltip">
                                 Please provide a valid city.
                              </div>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label for="validationTooltip04">State</label>
                              <select class="custom-select" id="validationTooltip04" required="">
                                 <option selected="" disabled="" value="">Choose...</option>
                                 <option>...</option>
                              </select>
                              <div class="invalid-tooltip">
                                 Please select a valid state.
                              </div>
                           </div>
                           <div class="col-md-3 mb-3">
                              <label for="validationTooltip05">Zip</label>
                              <input type="text" class="form-control" id="validationTooltip05" required="">
                              <div class="invalid-tooltip">
                                 Please provide a valid zip.
                              </div>
                           </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit form</button>
                     </form>
                     <hr>
                     <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                     </div>
                     <hr>
                     <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio1">Toggle this custom radio</label>
                     </div>
                     <div class="custom-control custom-radio">
                        <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                        <label class="custom-control-label" for="customRadio2">Or toggle this other custom radio</label>
                     </div>
                     <hr>
                     <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline1">Toggle this custom radio</label>
                     </div>
                     <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline2">Or toggle this other custom radio</label>
                     </div>
                     <hr>
                     <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheckDisabled1" disabled>
                        <label class="custom-control-label" for="customCheckDisabled1">Check this custom checkbox</label>
                     </div>
                     <div class="custom-control custom-radio">
                        <input type="radio" name="radioDisabled" id="customRadioDisabled2" class="custom-control-input" disabled>
                        <label class="custom-control-label" for="customRadioDisabled2">Toggle this custom radio</label>
                     </div>
                     <hr>
                     <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="customSwitch1">
                        <label class="custom-control-label" for="customSwitch1">Toggle this switch element</label>
                     </div>
                     <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" disabled id="customSwitch2">
                        <label class="custom-control-label" for="customSwitch2">Disabled switch element</label>
                     </div>
                     <hr>
                     <select class="custom-select custom-select-lg mb-3">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                     </select>
                     <select class="custom-select custom-select-sm">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                     </select>
                     <hr>
                     <label for="customRange2">Example range</label>
                     <input type="range" class="custom-range" min="0" max="5" id="customRange2">
                     <hr>
                     <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                     </div>
                     <hr>
                     <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFileLang" lang="es">
                        <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
                     </div>
                     <hr>
                     <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFileLangHTML">
                        <label class="custom-file-label" for="customFileLangHTML" data-browse="Bestand kiezen">Voeg je document toe</label>
                     </div>
                  </div>
                  <div id="Input-group" class="pb-5 mb-5 border-bottom">
                     <h2 class="h5">Input group</h2>
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <span class="input-group-text" id="basic-addon1">@</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                     </div>
                     <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                           <span class="input-group-text" id="basic-addon2">@example.com</span>
                        </div>
                     </div>
                     <label for="basic-url">Your vanity URL</label>
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                        </div>
                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                     </div>
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <span class="input-group-text">$</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                        <div class="input-group-append">
                           <span class="input-group-text">.00</span>
                        </div>
                     </div>
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text">With textarea</span>
                        </div>
                        <textarea class="form-control" aria-label="With textarea"></textarea>
                     </div>
                     <hr>
                     <div class="input-group flex-nowrap">
                        <div class="input-group-prepend">
                           <span class="input-group-text" id="addon-wrapping">@</span>
                        </div>
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                     </div>
                     <hr>
                     <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                           <span class="input-group-text" id="inputGroup-sizing-sm">Small</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                     </div>
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                     </div>
                     <div class="input-group input-group-lg">
                        <div class="input-group-prepend">
                           <span class="input-group-text" id="inputGroup-sizing-lg">Large</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                     </div>
                     <hr>
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <div class="input-group-text">
                              <input type="checkbox" aria-label="Checkbox for following text input">
                           </div>
                        </div>
                        <input type="text" class="form-control" aria-label="Text input with checkbox">
                     </div>
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <div class="input-group-text">
                              <input type="radio" aria-label="Radio button for following text input">
                           </div>
                        </div>
                        <input type="text" class="form-control" aria-label="Text input with radio button">
                     </div>
                     <hr>
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text">First and last name</span>
                        </div>
                        <input type="text" aria-label="First name" class="form-control">
                        <input type="text" aria-label="Last name" class="form-control">
                     </div>
                     <hr>
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <span class="input-group-text">$</span>
                           <span class="input-group-text">0.00</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                     </div>
                     <div class="input-group">
                        <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                        <div class="input-group-append">
                           <span class="input-group-text">$</span>
                           <span class="input-group-text">0.00</span>
                        </div>
                     </div>
                     <hr>
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <button class="btn btn-outline-secondary" type="button" id="button-addon1">Button</button>
                        </div>
                        <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                     </div>
                     <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                           <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
                        </div>
                     </div>
                     <div class="input-group mb-3">
                        <div class="input-group-prepend" id="button-addon3">
                           <button class="btn btn-outline-secondary" type="button">Button</button>
                           <button class="btn btn-outline-secondary" type="button">Button</button>
                        </div>
                        <input type="text" class="form-control" placeholder="" aria-label="Example text with two button addons" aria-describedby="button-addon3">
                     </div>
                     <div class="input-group">
                        <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username with two button addons" aria-describedby="button-addon4">
                        <div class="input-group-append" id="button-addon4">
                           <button class="btn btn-outline-secondary" type="button">Button</button>
                           <button class="btn btn-outline-secondary" type="button">Button</button>
                        </div>
                     </div>
                     <hr>
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
                           <div class="dropdown-menu">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                              <div role="separator" class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Separated link</a>
                           </div>
                        </div>
                        <input type="text" class="form-control" aria-label="Text input with dropdown button">
                     </div>
                     <div class="input-group">
                        <input type="text" class="form-control" aria-label="Text input with dropdown button">
                        <div class="input-group-append">
                           <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
                           <div class="dropdown-menu">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                              <div role="separator" class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Separated link</a>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <button type="button" class="btn btn-outline-secondary">Action</button>
                           <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <span class="sr-only">Toggle Dropdown</span>
                           </button>
                           <div class="dropdown-menu">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                              <div role="separator" class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Separated link</a>
                           </div>
                        </div>
                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button">
                     </div>
                     <div class="input-group">
                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button">
                        <div class="input-group-append">
                           <button type="button" class="btn btn-outline-secondary">Action</button>
                           <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <span class="sr-only">Toggle Dropdown</span>
                           </button>
                           <div class="dropdown-menu">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                              <div role="separator" class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Separated link</a>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <button type="button" class="btn btn-outline-secondary">Action</button>
                           <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <span class="sr-only">Toggle Dropdown</span>
                           </button>
                           <div class="dropdown-menu">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                              <div role="separator" class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Separated link</a>
                           </div>
                        </div>
                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button">
                     </div>
                     <div class="input-group">
                        <input type="text" class="form-control" aria-label="Text input with segmented dropdown button">
                        <div class="input-group-append">
                           <button type="button" class="btn btn-outline-secondary">Action</button>
                           <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <span class="sr-only">Toggle Dropdown</span>
                           </button>
                           <div class="dropdown-menu">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                              <div role="separator" class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Separated link</a>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                           <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                           <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                     </div>
                     <div class="input-group mb-3">
                        <div class="custom-file">
                           <input type="file" class="custom-file-input" id="inputGroupFile02">
                           <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                        </div>
                        <div class="input-group-append">
                           <span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
                        </div>
                     </div>
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                           <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03">Button</button>
                        </div>
                        <div class="custom-file">
                           <input type="file" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                           <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                        </div>
                     </div>
                     <div class="input-group">
                        <div class="custom-file">
                           <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                           <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                        </div>
                        <div class="input-group-append">
                           <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Button</button>
                        </div>
                     </div>
                  </div>
                  <div id="Jumbotron" class="pb-5 mb-5 border-bottom">
                     <h2 class="h5">Jumbotron</h2>
                     <div class="jumbotron">
                        <h1 class="display-4">Hello, world!</h1>
                        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                        <hr class="my-4">
                        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                     </div>
                     <hr>
                     <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                           <h1 class="display-4">Fluid jumbotron</h1>
                           <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                        </div>
                     </div>
                  </div>
                  <div id="Modal" class="pb-5 mb-5 border-bottom">
                     <h2 class="h5">Modal</h2>
                     <!-- Button trigger modal -->
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                     Launch demo modal
                     </button>
                     <!-- Modal -->
                     <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 ...
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="button" class="btn btn-primary">Save changes</button>
                              </div>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <!-- Button trigger modal -->
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                     Launch static backdrop modal
                     </button>
                     <!-- Modal -->
                     <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 ...
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="button" class="btn btn-primary">Understood</button>
                              </div>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <!-- Button trigger modal -->
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                     Launch demo modal
                     </button>
                     <!-- Modal -->
                     <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 ...
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="button" class="btn btn-primary">Save changes</button>
                              </div>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <!-- Button trigger modal -->
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
                     Launch demo modal
                     </button>
                     <!-- Modal -->
                     <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 ...
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="button" class="btn btn-primary">Save changes</button>
                              </div>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <!-- Button trigger modal -->
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                     Launch demo modal
                     </button>
                     <!-- Modal -->
                     <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <div class="modal-body">
                                 ...
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="button" class="btn btn-primary">Save changes</button>
                              </div>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <!-- Extra large modal -->
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Extra large modal</button>
                     <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                           <div class="modal-content">
                              ...
                           </div>
                        </div>
                     </div>
                     <!-- Large modal -->
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>
                     <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                           <div class="modal-content">
                              ...
                           </div>
                        </div>
                     </div>
                     <!-- Small modal -->
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-sm">Small modal</button>
                     <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                           <div class="modal-content">
                              ...
                           </div>
                        </div>
                     </div>
                  </div>
                  <div id="List-group" class="pb-5 mb-5 border-bottom">
                     <h2 class="h5">List group</h2>
                     <ul class="list-group">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Morbi leo risus</li>
                        <li class="list-group-item">Porta ac consectetur ac</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                     </ul>
                     <hr>
                     <ul class="list-group">
                        <li class="list-group-item active">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Morbi leo risus</li>
                        <li class="list-group-item">Porta ac consectetur ac</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                     </ul>
                     <hr>
                     <ul class="list-group">
                        <li class="list-group-item active">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Morbi leo risus</li>
                        <li class="list-group-item">Porta ac consectetur ac</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                     </ul>
                     <hr>
                     <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action active">
                        Cras justo odio
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
                        <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
                        <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
                        <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">Vestibulum at eros</a>
                     </div>
                     <hr>
                     <div class="list-group">
                        <button type="button" class="list-group-item list-group-item-action active">
                        Cras justo odio
                        </button>
                        <button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in</button>
                        <button type="button" class="list-group-item list-group-item-action">Morbi leo risus</button>
                        <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</button>
                        <button type="button" class="list-group-item list-group-item-action" disabled>Vestibulum at eros</button>
                     </div>
                     <hr>
                     <ul class="list-group list-group-horizontal">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Morbi leo risus</li>
                     </ul>
                     <hr>
                     <ul class="list-group">
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item list-group-item-primary">A simple primary list group item</li>
                        <li class="list-group-item list-group-item-secondary">A simple secondary list group item</li>
                        <li class="list-group-item list-group-item-success">A simple success list group item</li>
                        <li class="list-group-item list-group-item-danger">A simple danger list group item</li>
                        <li class="list-group-item list-group-item-warning">A simple warning list group item</li>
                        <li class="list-group-item list-group-item-info">A simple info list group item</li>
                        <li class="list-group-item list-group-item-light">A simple light list group item</li>
                        <li class="list-group-item list-group-item-dark">A simple dark list group item</li>
                     </ul>
                     <hr>
                     <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-primary">A simple primary list group item</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">A simple secondary list group item</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-success">A simple success list group item</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-danger">A simple danger list group item</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-warning">A simple warning list group item</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-info">A simple info list group item</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-light">A simple light list group item</a>
                        <a href="#" class="list-group-item list-group-item-action list-group-item-dark">A simple dark list group item</a>
                     </div>
                     <hr>
                     <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                           Cras justo odio
                           <span class="badge badge-primary badge-pill">14</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                           Dapibus ac facilisis in
                           <span class="badge badge-primary badge-pill">2</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                           Morbi leo risus
                           <span class="badge badge-primary badge-pill">1</span>
                        </li>
                     </ul>
                     <hr>
                     <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action active">
                           <div class="d-flex w-100 justify-content-between">
                              <h5 class="mb-1">List group item heading</h5>
                              <small>3 days ago</small>
                           </div>
                           <p class="mb-1 text-white">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                           <small>Donec id elit non mi porta.</small>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                           <div class="d-flex w-100 justify-content-between">
                              <h5 class="mb-1">List group item heading</h5>
                              <small class="text-muted">3 days ago</small>
                           </div>
                           <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                           <small class="text-muted">Donec id elit non mi porta.</small>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                           <div class="d-flex w-100 justify-content-between">
                              <h5 class="mb-1">List group item heading</h5>
                              <small class="text-muted">3 days ago</small>
                           </div>
                           <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                           <small class="text-muted">Donec id elit non mi porta.</small>
                        </a>
                     </div>
                     <hr>
                     <div class="row">
                        <div class="col-4">
                           <div class="list-group" id="list-tab" role="tablist">
                              <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Home</a>
                              <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
                              <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Messages</a>
                              <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a>
                           </div>
                        </div>
                        <div class="col-8">
                           <div class="tab-content" id="nav-tabContent">
                              <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">...</div>
                              <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">...</div>
                              <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...</div>
                              <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...</div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div id="Navs" class="pb-5 mb-5 border-bottom">
                     <h2 class="h5">Navs</h2>
                     <ul class="nav">
                        <li class="nav-item">
                           <a class="nav-link active" href="#">Active</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                     </ul>
                     <hr>
                     <nav class="nav">
                        <a class="nav-link active" href="#">Active</a>
                        <a class="nav-link" href="#">Link</a>
                        <a class="nav-link" href="#">Link</a>
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                     </nav>
                     <hr>
                     <ul class="nav justify-content-center">
                        <li class="nav-item">
                           <a class="nav-link active" href="#">Active</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                     </ul>
                     <hr>
                     <ul class="nav justify-content-end">
                        <li class="nav-item">
                           <a class="nav-link active" href="#">Active</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                     </ul>
                     <hr>
                     <ul class="nav flex-column">
                        <li class="nav-item">
                           <a class="nav-link active" href="#">Active</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                     </ul>
                     <hr>
                     <nav class="nav flex-column">
                        <a class="nav-link active" href="#">Active</a>
                        <a class="nav-link" href="#">Link</a>
                        <a class="nav-link" href="#">Link</a>
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                     </nav>
                     <hr>
                     <ul class="nav nav-tabs">
                        <li class="nav-item">
                           <a class="nav-link active" href="#">Active</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                     </ul>
                     <hr>
                     <ul class="nav nav-pills">
                        <li class="nav-item">
                           <a class="nav-link active" href="#">Active</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                     </ul>
                     <hr>
                     <ul class="nav nav-pills nav-fill">
                        <li class="nav-item">
                           <a class="nav-link active" href="#">Active</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Much longer nav link</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                     </ul>
                     <hr>
                     <ul class="nav nav-tabs">
                        <li class="nav-item">
                           <a class="nav-link active" href="#">Active</a>
                        </li>
                        <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                           <div class="dropdown-menu">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Separated link</a>
                           </div>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                     </ul>
                     <hr>
                     <ul class="nav nav-pills">
                        <li class="nav-item">
                           <a class="nav-link active" href="#">Active</a>
                        </li>
                        <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                           <div class="dropdown-menu">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Separated link</a>
                           </div>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                     </ul>
                     <hr>
                     <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                           <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                        </li>
                     </ul>
                     <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                     </div>
                     <hr>
                     <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                           <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Home</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
                        </li>
                     </ul>
                     <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">...</div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
                     </div>
                     <hr>
                     <div class="row">
                        <div class="col-3">
                           <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                              <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
                              <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                              <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                              <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                           </div>
                        </div>
                        <div class="col-9">
                           <div class="tab-content" id="v-pills-tabContent">
                              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">...</div>
                              <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
                              <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                              <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div id="Navbar" class="pb-5 mb-5 border-bottom">
                     <h2 class="h5">Navbar</h2>
                     <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="#">Navbar</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item active">
                                 <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#">Link</a>
                              </li>
                              <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 Dropdown
                                 </a>
                                 <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                 </div>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                              </li>
                           </ul>
                           <form class="form-inline my-2 my-lg-0">
                              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                           </form>
                        </div>
                     </nav>
                     <hr>
                     <!-- As a link -->
                     <nav class="navbar navbar-light bg-light">
                        <a class="navbar-brand" href="#">Navbar</a>
                     </nav>
                     <!-- As a heading -->
                     <nav class="navbar navbar-light bg-light">
                        <span class="navbar-brand mb-0 h1">Navbar</span>
                     </nav>
                     <hr>
                     <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="#">Navbar</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                           <ul class="navbar-nav">
                              <li class="nav-item active">
                                 <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#">Features</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#">Pricing</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                              </li>
                           </ul>
                        </div>
                     </nav>
                     <hr>
                     <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="#">Navbar</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                           <div class="navbar-nav">
                              <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                              <a class="nav-item nav-link" href="#">Features</a>
                              <a class="nav-item nav-link" href="#">Pricing</a>
                              <a class="nav-item nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                           </div>
                        </div>
                     </nav>
                     <hr>
                     <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="#">Navbar</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                           <ul class="navbar-nav">
                              <li class="nav-item active">
                                 <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#">Features</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#">Pricing</a>
                              </li>
                              <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 Dropdown link
                                 </a>
                                 <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </nav>
                     <hr>
                     <nav class="navbar navbar-light bg-light">
                        <a class="navbar-brand">Navbar</a>
                        <form class="form-inline">
                           <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                           <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                     </nav>
                     <hr>
                     <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="#">Navbar w/ text</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarText">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item active">
                                 <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#">Features</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#">Pricing</a>
                              </li>
                           </ul>
                           <span class="navbar-text">
                           Navbar text with an inline element
                           </span>
                        </div>
                     </nav>
                     <hr>
                     <div class="bd-example">
                        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                           <a class="navbar-brand" href="#">Navbar</a>
                           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                           </button>
                           <div class="collapse navbar-collapse" id="navbarColor01">
                              <ul class="navbar-nav mr-auto">
                                 <li class="nav-item active">
                                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="#">Features</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="#">Pricing</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="#">About</a>
                                 </li>
                              </ul>
                              <form class="form-inline">
                                 <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                 <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
                              </form>
                           </div>
                        </nav>
                        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                           <a class="navbar-brand" href="#">Navbar</a>
                           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                           </button>
                           <div class="collapse navbar-collapse" id="navbarColor02">
                              <ul class="navbar-nav mr-auto">
                                 <li class="nav-item active">
                                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="#">Features</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="#">Pricing</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="#">About</a>
                                 </li>
                              </ul>
                              <form class="form-inline">
                                 <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                 <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                              </form>
                           </div>
                        </nav>
                        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
                           <a class="navbar-brand" href="#">Navbar</a>
                           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                           </button>
                           <div class="collapse navbar-collapse" id="navbarColor03">
                              <ul class="navbar-nav mr-auto">
                                 <li class="nav-item active">
                                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="#">Features</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="#">Pricing</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="#">About</a>
                                 </li>
                              </ul>
                              <form class="form-inline">
                                 <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                 <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                              </form>
                           </div>
                        </nav>
                     </div>
                     <hr>
                     <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand" href="#">Navbar</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                           <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                              <li class="nav-item active">
                                 <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#">Link</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                              </li>
                           </ul>
                           <form class="form-inline my-2 my-lg-0">
                              <input class="form-control mr-sm-2" type="search" placeholder="Search">
                              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                           </form>
                        </div>
                     </nav>
                  </div>
                  <div id="Pagination" class="pb-5 mb-5 border-bottom">
                     <h2 class="h5">Pagination</h2>
                     <nav aria-label="Page navigation example">
                        <ul class="pagination">
                           <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                           <li class="page-item"><a class="page-link" href="#">1</a></li>
                           <li class="page-item"><a class="page-link" href="#">2</a></li>
                           <li class="page-item"><a class="page-link" href="#">3</a></li>
                           <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                     </nav>
                     <hr>
                     <nav aria-label="Page navigation example">
                        <ul class="pagination">
                           <li class="page-item">
                              <a class="page-link" href="#" aria-label="Previous">
                              <span aria-hidden="true">&laquo;</span>
                              </a>
                           </li>
                           <li class="page-item"><a class="page-link" href="#">1</a></li>
                           <li class="page-item"><a class="page-link" href="#">2</a></li>
                           <li class="page-item"><a class="page-link" href="#">3</a></li>
                           <li class="page-item">
                              <a class="page-link" href="#" aria-label="Next">
                              <span aria-hidden="true">&raquo;</span>
                              </a>
                           </li>
                        </ul>
                     </nav>
                     <hr>
                     <nav aria-label="...">
                        <ul class="pagination">
                           <li class="page-item disabled">
                              <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                           </li>
                           <li class="page-item"><a class="page-link" href="#">1</a></li>
                           <li class="page-item active" aria-current="page">
                              <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                           </li>
                           <li class="page-item"><a class="page-link" href="#">3</a></li>
                           <li class="page-item">
                              <a class="page-link" href="#">Next</a>
                           </li>
                        </ul>
                     </nav>
                     <hr>
                     <nav aria-label="...">
                        <ul class="pagination">
                           <li class="page-item disabled">
                              <span class="page-link">Previous</span>
                           </li>
                           <li class="page-item"><a class="page-link" href="#">1</a></li>
                           <li class="page-item active" aria-current="page">
                              <span class="page-link">
                              2
                              <span class="sr-only">(current)</span>
                              </span>
                           </li>
                           <li class="page-item"><a class="page-link" href="#">3</a></li>
                           <li class="page-item">
                              <a class="page-link" href="#">Next</a>
                           </li>
                        </ul>
                     </nav>
                     <hr>
                     <nav aria-label="...">
                        <ul class="pagination pagination-lg">
                           <li class="page-item active" aria-current="page">
                              <span class="page-link">
                              1
                              <span class="sr-only">(current)</span>
                              </span>
                           </li>
                           <li class="page-item"><a class="page-link" href="#">2</a></li>
                           <li class="page-item"><a class="page-link" href="#">3</a></li>
                        </ul>
                     </nav>
                     <hr>
                     <nav aria-label="...">
                        <ul class="pagination pagination-sm">
                           <li class="page-item active" aria-current="page">
                              <span class="page-link">
                              1
                              <span class="sr-only">(current)</span>
                              </span>
                           </li>
                           <li class="page-item"><a class="page-link" href="#">2</a></li>
                           <li class="page-item"><a class="page-link" href="#">3</a></li>
                        </ul>
                     </nav>
                     <hr>
                     <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                           <li class="page-item disabled">
                              <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                           </li>
                           <li class="page-item"><a class="page-link" href="#">1</a></li>
                           <li class="page-item"><a class="page-link" href="#">2</a></li>
                           <li class="page-item"><a class="page-link" href="#">3</a></li>
                           <li class="page-item">
                              <a class="page-link" href="#">Next</a>
                           </li>
                        </ul>
                     </nav>
                     <hr>
                     <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                           <li class="page-item disabled">
                              <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                           </li>
                           <li class="page-item"><a class="page-link" href="#">1</a></li>
                           <li class="page-item"><a class="page-link" href="#">2</a></li>
                           <li class="page-item"><a class="page-link" href="#">3</a></li>
                           <li class="page-item">
                              <a class="page-link" href="#">Next</a>
                           </li>
                        </ul>
                     </nav>
                  </div>
                  <div id="Progress" class="pb-5 mb-5 border-bottom">
                     <h2 class="h5">Progress</h2>
                     <div class="progress mb-2">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                     <div class="progress mb-2">
                        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                     <div class="progress mb-2">
                        <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                     <div class="progress mb-2">
                        <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                     <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                     <hr>
                     <div class="progress">
                        <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                     <hr>
                     <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                     </div>
                     <hr>
                     <div class="progress mb-2" style="height: 1px;">
                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                     <div class="progress" style="height: 20px;">
                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                     <hr>
                     <div class="progress mb-2">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                     <div class="progress mb-2">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                     <div class="progress mb-2">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                     <div class="progress mb-2">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                     <hr>
                     <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                     <hr>
                     <div class="progress mb-2">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                     <div class="progress mb-2">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                     <div class="progress mb-2">
                        <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                     <div class="progress mb-2">
                        <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                     <div class="progress">
                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                     </div>
                     <hr>
                     <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Bootstrap core JavaScript -->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- slick Slider JS-->
      <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="js/osahan.js"></script>
   </body>
</html>

@endsection