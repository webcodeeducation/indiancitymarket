  <!-- Section: Filters -->
  <section id="filter">

    <h5>Filters</h5>

    <!-- Section: Condition -->
    <section class="mb-4">

      <h6 class="font-weight-bold mb-3">Condition</h6>

      <div class="form-check pl-0 mb-3">
        <input type="checkbox" class="form-check-input filled-in" id="new">
        <label class="form-check-label small text-uppercase card-link-secondary" for="new">New</label>
      </div>
      <div class="form-check pl-0 mb-3">
        <input type="checkbox" class="form-check-input filled-in" id="used">
        <label class="form-check-label small text-uppercase card-link-secondary" for="used">Used</label>
      </div>
      <div class="form-check pl-0 mb-3">
        <input type="checkbox" class="form-check-input filled-in" id="collectible">
        <label class="form-check-label small text-uppercase card-link-secondary" for="collectible">Collectible</label>
      </div>
      <div class="form-check pl-0 mb-3 pb-1">
        <input type="checkbox" class="form-check-input filled-in" id="renewed">
        <label class="form-check-label small text-uppercase card-link-secondary" for="renewed">Renewed</label>
      </div>

    </section>
    <!-- Section: Condition -->

    <!-- Section: Price -->
    <section class="mb-4">

      <h6 class="font-weight-bold mb-3">Price</h6>

      <div class="form-check pl-0 mb-3">
        <input type="radio" class="form-check-input" id="under25" name="materialExampleRadios">
        <label class="form-check-label small text-uppercase card-link-secondary" for="under25">Under $25</label>
      </div>
      <div class="form-check pl-0 mb-3">
        <input type="radio" class="form-check-input" id="2550" name="materialExampleRadios">
        <label class="form-check-label small text-uppercase card-link-secondary" for="2550">$25 to $50</label>
      </div>
      <div class="form-check pl-0 mb-3">
        <input type="radio" class="form-check-input" id="50100" name="materialExampleRadios">
        <label class="form-check-label small text-uppercase card-link-secondary" for="50100">$50 to $100</label>
      </div>
      <div class="form-check pl-0 mb-3">
        <input type="radio" class="form-check-input" id="100200" name="materialExampleRadios">
        <label class="form-check-label small text-uppercase card-link-secondary" for="100200">$100 to $200</label>
      </div>
      <div class="form-check pl-0 mb-3">
        <input type="radio" class="form-check-input" id="200above" name="materialExampleRadios">
        <label class="form-check-label small text-uppercase card-link-secondary" for="200above">$200 & Above</label>
      </div>
      <form>
        <div class="d-flex align-items-center mt-4 pb-1">
          <div class="md-form md-outline my-0">
            <input id="from" type="text" class="form-control mb-0">
            <label for="form">$ Min</label>
          </div>
          <p class="px-2 mb-0 text-muted"> - </p>
          <div class="md-form md-outline my-0">
            <input id="to" type="text" class="form-control mb-0">
            <label for="to">$ Max</label>
          </div>
        </div>
      </form>

    </section>
    <!-- Section: Price -->

    <!-- Section: Price version 2 -->
    <section class="mb-4">

      <h6 class="font-weight-bold mb-3">Price</h6>

      <div class="slider-price d-flex align-items-center my-4">
        <span class="font-weight-normal small text-muted mr-2">$0</span>
        <form class="multi-range-field w-100 mb-1">
          <input id="multi" class="multi-range" type="range" />
        </form>
        <span class="font-weight-normal small text-muted ml-2">$100</span>
      </div>

    </section>
    <!-- Section: Price version 2 -->

    <!-- Section: Size -->
    <section class="mb-4">

      <h6 class="font-weight-bold mb-3">Size</h6>

      <div class="form-check pl-0 mb-3">
        <input type="checkbox" class="form-check-input filled-in" id="34">
        <label class="form-check-label small text-uppercase card-link-secondary" for="34">34</label>
      </div>
      <div class="form-check pl-0 mb-3">
        <input type="checkbox" class="form-check-input filled-in" id="36">
        <label class="form-check-label small text-uppercase card-link-secondary" for="36">36</label>
      </div>
      <div class="form-check pl-0 mb-3">
        <input type="checkbox" class="form-check-input filled-in" id="38">
        <label class="form-check-label small text-uppercase card-link-secondary" for="38">38</label>
      </div>
      <div class="form-check pl-0 mb-3">
        <input type="checkbox" class="form-check-input filled-in" id="40">
        <label class="form-check-label small text-uppercase card-link-secondary" for="40">40</label>
      </div>
      <a class="btn btn-link text-muted p-0" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        More
      </a>
      <div class="collapse pt-3" id="collapseExample">
        <div class="form-check pl-0 mb-3">
          <input type="checkbox" class="form-check-input filled-in" id="42">
          <label class="form-check-label small text-uppercase card-link-secondary" for="42">42</label>
        </div>
        <div class="form-check pl-0 mb-3">
          <input type="checkbox" class="form-check-input filled-in" id="44">
          <label class="form-check-label small text-uppercase card-link-secondary" for="44">44</label>
        </div>
        <div class="form-check pl-0 mb-3">
          <input type="checkbox" class="form-check-input filled-in" id="46">
          <label class="form-check-label small text-uppercase card-link-secondary" for="46">46</label>
        </div>
        <div class="form-check pl-0 mb-3">
          <input type="checkbox" class="form-check-input filled-in" id="50">
          <label class="form-check-label small text-uppercase card-link-secondary" for="50">50</label>
        </div>
      </div>

    </section>
    <!-- Section: Size -->

    <!-- Section: Color -->
    <section class="mb-4">

      <h6 class="font-weight-bold mb-3">Color</h6>

      <div class="btn-group btn-group-toggle btn-color-group d-block mt-n2 ml-n2" data-toggle="buttons">
        <label class="btn rounded-circle white border-inset-grey p-3 m-2">
          <input type="checkbox" autocomplete="off">
        </label>
        <label class="btn rounded-circle grey p-3 m-2">
          <input type="checkbox" autocomplete="off">
        </label>
        <label class="btn rounded-circle black p-3 m-2">
          <input type="checkbox" autocomplete="off">
        </label>
        <label class="btn rounded-circle green p-3 m-2">
          <input type="checkbox" autocomplete="off">
        </label>
        <label class="btn rounded-circle blue p-3 m-2">
          <input type="checkbox" autocomplete="off">
        </label>
        <label class="btn rounded-circle purple p-3 m-2">
          <input type="checkbox" autocomplete="off">
        </label>
        <label class="btn rounded-circle yellow p-3 m-2">
          <input type="checkbox" autocomplete="off">
        </label>
        <label class="btn rounded-circle indigo p-3 m-2">
          <input type="checkbox" checked autocomplete="off">
        </label>
        <label class="btn rounded-circle red p-3 m-2">
          <input type="checkbox" autocomplete="off">
        </label>
        <label class="btn rounded-circle orange p-3 m-2">
          <input type="checkbox" autocomplete="off">
        </label>
      </div>

    </section>
    <!-- Section: Color -->

  </section>
  <!-- Section: Filters -->