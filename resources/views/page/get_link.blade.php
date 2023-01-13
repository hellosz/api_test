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
        </el-form>


    </div>
    <div style="text-align:center;">
        <el-button type="primary" @click="this.submit">Get Link</el-button>
    </div>





    <!--弹窗-->
    <el-dialog :visible.sync="visible" title="Result">
        <template>
            <el-tabs v-model="form.activeName">
                <el-tab-pane label="Standard Link" name="first">
                    <el-input id="link_inputid" type="textarea" v-model="form.StandardLink" :rows="5" disabled>
                    </el-input>
                </el-tab-pane>
                <el-tab-pane label="HTML" name="second">
                    <el-input id="html_inputid" type="textarea" v-model="form.Html" :rows="5" disabled></el-input>
                </el-tab-pane>
            </el-tabs>

            <div style="text-align:center;padding-top: 10px;">
                <el-button type="primary" @click="this.copyData">Copy</el-button>
            </div>

        </template>
    </el-dialog>


</div>
</body>
<!-- import Vue before Element -->
<script src="https://unpkg.com/vue@2/dist/vue.js"></script>
<!-- import JavaScript -->
<script type="text/javascript" src="https://unpkg.com/element-ui/lib/index.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-2.1.4.min.js"></script>
<script>
    new Vue({
        el: '#app',
        data: function () {
            return {
                visible: false,
                form: {
                    url: '',
                    Link: '',
                    StandardLink: '',
                    Html: '',
                    activeName: 'first'
                }
            }
        },
        methods: {
            submit() {


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
                var settings = {
                    // "url": "http://8.135.120.218:8000/test/createAdlink",
                    "url": "https://www.hellosz.top/test/createAdlink",
                    "method": "POST",
                    "timeout": 0,
                    "headers": {
                        "Access-Control-Allow-Origin": "*",
                        "Access-Control-Allow-Methods": "POST, GET, PUT, OPTIONS, DELETE",
                    },
                    "data": JSON.stringify({
                        "link": this.form.url,
                        "name": this.form.Link
                    }),
                };

                var that = this;

                $.ajax(settings).done(function (response) {
                    console.log(response);
                    var id = response.data.adlinkId;
                    that.visible = true;
                    that.form.StandardLink = that.form.url + "?adlk_id=" + id;
                    that.form.Html = "<a target='_blank' href='" + that.form.StandardLink + "'>" +
                        that.form.Link + "</a>";
                });



            },
            copyData() {

                const range = document.createRange(); //创建range对象
                var htmlid = "link_inputid";
                if (this.form.activeName == "second") {
                    htmlid = "html_inputid";
                }
                range.selectNode(document.getElementById(htmlid)); //获取复制内容的 id 选择器
                const selection = window.getSelection(); //创建 selection对象
                if (selection.rangeCount > 0) {
                    selection.removeAllRanges(); //如果页面已经有选取了的话，会自动删除这个选区，没有选区的话，会把这个选取加入选区
                }
                selection.addRange(range); //将range对象添加到selection选区当中，会高亮文本块
                document.execCommand('copy'); //复制选中的文字到剪贴板
                this.$message({
                    message: '复制成功',
                    type: 'success'
                });
                selection.removeRange(range); // 移除选中的元素
            }
        },
    })
</script>

</html>
