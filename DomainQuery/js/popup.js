// 在点开插件的时候获取当前页面的host地址,然后显示到id为domain的元素中
chrome.tabs.query({ active: true, currentWindow: true }, function (tabs) {
    var tab = tabs[0];
    var url = new URL(tab.url);
    var domain = url.hostname;
    document.getElementById("domain").value = domain;
    chrome.storage.sync.get(["key"], function (result) {
        if (result.key) {
            document.getElementById("key").value = result.key;
        }
    });
    // 从chrome.storage.sync中获取api的值，如果有值，则将对应的单选框选中
    chrome.storage.sync.get(["api"], function (result) {
        if (result.api) {
            document.querySelector(
                'input[name="api"][value="' + result.api + '"]'
            ).checked = true;
        }
    });
});

// 当key元素失去焦点时，将key的值保存到chrome.storage.sync中
document.getElementById("key").onblur = function () {
    var key = document.getElementById("key").value;
    chrome.storage.sync.set({ key: key }, function () {
        console.log("key 保存成功");
    });
};
// 当单选框的值改变时，将单选框的值保存到chrome.storage.sync中
var radios = document.querySelectorAll('input[type=radio][name="api"]');
radios.forEach(function (radio) {
    radio.addEventListener("click", function () {
        // 在这里执行相应的操作
        console.log("Radio value: " + this.value);
        chrome.storage.sync.set({ api: this.value }, function () {
            console.log("api 保存成功");
        });
    });
});

// 在点开插件的时候,查询当前damain是否有保存过数据，如果有，则显示保存的数据
chrome.tabs.query({ active: true, currentWindow: true }, function (tabs) {
    var tab = tabs[0];
    var url = new URL(tab.url);
    var domain = url.hostname;
    chrome.storage.sync.get([domain], function (result) {
        console.log("domain 读取成功");
        console.log(result[domain]);
        if (result[domain]) {
            document.getElementById("unit").innerText = result[domain].unit;
            document.getElementById("kind").innerText = result[domain].kind;
            document.getElementById("icp").innerText = result[domain].icp;
            document.getElementById("siteName").innerText =
                result[domain].siteName;
            document.getElementById("passTime").innerText =
                result[domain].passTime;
        }
    });
});

// 当点击id为query的元素时，获取name为api的单选框元素选中的值和获取id为key的元素的value值，
// 然后再获取id为domain的元素的value值，
// 根据单选框的值，拼接不同的url，
// 然后发送请求，获取数据，不同的api返回的数据格式不一样，所以需要对数据进行处理，
// 然后显示到id为unit、kind、icp、siteName、passTime的元素中
document.getElementById("query").onclick = function () {
    var api = document.querySelector('input[name="api"]:checked').value;
    var key = document.getElementById("key").value;
    var domain = document.getElementById("domain").value;
    var url = "";
    if (api == "beianx") {
        url =
            "https://open.beianx.cn/api/query_icp_v4?api_key=" +
            key +
            "&domain=" +
            domain;
    } else if (api == "5118") {
        url = "http://apis.5118.com/icp/getinfo";
        var data = "searchtext=" + domain;
        var xhr = new XMLHttpRequest();
        xhr.withCredentials = true;
        xhr.addEventListener("readystatechange", function () {
            if (this.readyState === 4) {
                console.log(this.responseText);
                var result = JSON.parse(xhr.responseText);
                var unit, kind, icp, siteName, passTime;
                unit = result.data.subject.company_name;
                kind = result.data.subject.company_type;
                icp = result.data.site_info.site_license;
                siteName = result.data.site_info.site_name;
                passTime = result.data.subject.confirm_time;
                document.getElementById("unit").innerText = unit;
                document.getElementById("kind").innerText = kind;
                document.getElementById("icp").innerText = icp;
                document.getElementById("siteName").innerText = siteName;
                document.getElementById("passTime").innerText = passTime;

                // 最后将数据保存到chrome.storage.sync中，以domain为key，以对象为value
                chrome.storage.sync.set(
                    { [domain]: { unit, kind, icp, siteName, passTime } },
                    function () {
                        console.log("result 保存成功");
                    }
                );
            }
        });
        xhr.open("POST", url);
        xhr.setRequestHeader("Authorization", key);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(data);
        return;
    } else if (api == "chinaz") {
        url =
            "https://apidatav2.chinaz.com/single/icp?key=" +
            key +
            "&domain=" +
            domain;
    }
    var xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            var result = JSON.parse(xhr.responseText);
            if (api == "beianx") {
                document.getElementById("unit").innerText = result.data[0].unit;
                document.getElementById("kind").innerText = result.data[0].kind;
                document.getElementById("icp").innerText = result.data[0].icp;
                document.getElementById("siteName").innerText =
                    result.data[0].site_name;
                document.getElementById("passTime").innerText =
                    result.data[0].pass_time;
            } else if (api == "5118") {
                // 无需处理，上面已经处理过了
            } else if (api == "chinaz") {
                if (result.Result == null) {
                    alert("查询失败:" + result.Reason);
                    return;
                }
                var unit, kind, icp, siteName, passTime;
                if (result.Result.Owner == "") {
                    unit = result.Result.CompanyName;
                } else {
                    unit = result.Result.Owner;
                }
                kind = result.Result.CompanyType;
                icp = result.Result.SiteLicense;
                siteName = result.Result.SiteName;
                passTime = result.Result.VerifyTime;
                document.getElementById("unit").innerText = unit;
                document.getElementById("kind").innerText = kind;
                document.getElementById("icp").innerText = icp;
                document.getElementById("siteName").innerText = siteName;
                document.getElementById("passTime").innerText = passTime;
            }

            // 最后将数据保存到chrome.storage.sync中，以domain为key，以对象为value，
            chrome.storage.sync.set(
                { [domain]: { unit, kind, icp, siteName, passTime } },
                function () {
                    console.log("result 保存成功");
                }
            );
        }
    };
    xhr.send();
};
