<div id="vue-admin-setting">
    <form @@submit.prevent="submit">
        <div class="row row-cards">
            <div class="col-md-6">
                <div class="card card-body border-0">
                    <h3 class="card-title">Gitalk</h3>
                    <div class="mb-3">
                        <label class="form-label">clientID</label>
                        <input type="text" v-model="data.Gitalk_clientID" class="form-control" required>
                        <small>GitHub Application Client ID</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">clientSecret</label>
                        <input type="text" v-model="data.Gitalk_clientSecret" class="form-control" required>
                        <small>GitHub Application Client Secret</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">repo</label>
                        <input type="text" v-model="data.Gitalk_repo" class="form-control" required>
                        <small>GitHub repo</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">owner</label>
                        <input type="text" v-model="data.Gitalk_owner" class="form-control" required>
                        <small>GitHub repository 所有者，可以是个人或者组织</small>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">admin</label>
                        <input type="text" v-model="data.Gitalk_admin" class="form-control" required>
                        <small>GitHub repository 的所有者和合作者 (对这个 repository 有写权限的用户) <b style="color: red">多个用,隔开</b></small>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-body border-0">
                    <h3 class="card-title">站点介绍</h3>
                    <div class="mb-3">
                        <textarea type="text" rows="5" v-model="data.about" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="margin-top: 10px">
                <button class="btn btn-dark" type="submit">提交</button>
            </div>
        </div>
    </form>
</div>
