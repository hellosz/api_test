<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <!-- import CSS -->
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
</head>

<body>
<div id="app">


    <div>
        <el-form ref="form" :model="form" label-width="130px">
            <el-form-item label="Enter the URL" :rules="[{ required: true, message: 'Enter the URL不能为空'}]">
                <el-input v-model="form.url" type="text" placeholder="Please Enter the URL">
                </el-input>
            </el-form-item>
            <el-form-item label="Name Your Link" :rules="[{ required: true, message: 'Name Your Link不能为空'}]">
                <el-input v-model="form.Link" type="text" placeholder="Please Enter Name Your Link" maxlength="250"
                          show-word-limit>
                </el-input>
            </el-form-item>



    </div>
    <div style="text-align:center;">
        <el-button type="primary" @click="this.submit">Get Link</el-button>
    </div>





    <!--弹窗-->
    <el-dialog :visible.sync="visible" title="Hello world">
        <p>Try Element</p>
    </el-dialog>


</div>
</body>
<!-- import Vue before Element -->
<script src="https://unpkg.com/vue@2/dist/vue.js"></script>
<!-- import JavaScript -->
<script type="text/javascript" src="https://unpkg.com/element-ui/lib/index.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-2.1.4.min.js"></script>
<script>
    new Vue({
        el: '#app',
        data: function () {
            return {
                visible: false,
                form: {
                    url: '',
                    Link: '',
                    date1: '',
                    date2: '',
                    delivery: false,
                    type: [],
                    resource: '',
                    desc: ''
                }
            }
        },
        methods: {
            submit() {
                var settings = {
                    // "url": "http://127.0.0.1:8003/test/createAdlink",
                    "url": "http://8.135.120.218:8000/test/createAdlink",
                    "method": "POST",
                    "timeout": 0,
                    "headers": {
                        "Access-Control-Allow-Origin":"*",
                        "Access-Control-Allow-Methods": "POST, GET, PUT, OPTIONS, DELETE",
                    },
                    "data": JSON.stringify({
                        "link": "http://www.patpat.com",
                        "name": "link_test"
                    }),
                };



                $.ajax(settings).done(function (response) {
                    console.log(response);
                });

                return;
                if (!this.form.url) {
                    this.$message({
                        message: 'Please Enter the URL!',
                        type: 'warning'
                    });
                    return;
                }
                if (!this.form.Link) {
                    this.$message({
                        message: 'Please Enter Name Your Link!',
                        type: 'warning'
                    });
                    return;
                }
                this.visible = true;

            },
        }
    })
</script>

</html>
