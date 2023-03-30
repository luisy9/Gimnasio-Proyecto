<template>
    <div class="container">
        <div class="row jutify-content-center">
            <div class="col-md-8">
                <div
                    class="alert alert-danger alert-dismissible fade show"
                    role="alert"
                >
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="Close"
                    ></button>
                    <strong>{{  }}</strong>
                </div>

                <div class="card card-default">
                    <div class="card-header">
                        <h5>Login</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group row">
                                <label
                                    for="email"
                                    class="col-sm-4 col-form-label text-md-right"
                                >
                                    E-Mail Address
                                </label>
                                <div class="col-md-8">
                                    <input
                                        id="email"
                                        type="email"
                                        class="form-control"
                                        required
                                        autofocus
                                        autocomplete="off"
                                        placeholder="Enter your email"
                                    >
                                </div>
                            </div>

                            <div class="form-group row mt-1">
                                <label
                                    for="password"
                                    class="col-md-4 col-form-label text-md-right"
                                >
                                    Password
                                </label>
                                <div class="col-md-8">
                                    <input
                                        id="password"
                                        type="password"
                                        class="form-control"
                                        required
                                        autocomplete="off"
                                        placeholder="Enter your password"
                                    >
                                </div>
                            </div>

                            <div class="form-group row mt-1 mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button
                                        type="submit"
                                        class="btn btn-success"
                                    >
                                        Login
                                    </button>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-md-8 offset-md-4">
                                    <small class="text-muted">
                                        Don't have any account yet? Please
                                        <router-link to="/register">
                                            Register
                                        </router-link>
                                    </small>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>;