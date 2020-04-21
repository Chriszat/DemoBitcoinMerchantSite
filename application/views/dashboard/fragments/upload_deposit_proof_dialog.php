<style>
    .hidepanel {
        display: none;
    }

    .displaypanel {
        display: block;
    }
</style>

<button class="btn text-white" onclick="document.getElementById('16SGeKxYVUxB6u7sHChqA6nNMcpPMDFW1z').classList.toggle('displaypanel')">Upload Payment Proof</button>
<small style="display: block; font-weight:bold; padding-top:10px">Only images are accepted</small>
<br>
<div style="border:1px solid lightgrey; padding:10px; width:400px; max-width:100%; margin:0 auto; " id="16SGeKxYVUxB6u7sHChqA6nNMcpPMDFW1z" class="hidepanel">
    <form id="acf44741545a0312c5495282d1ded087">
        <input type="file" id="file" name="file">
        <input type="hidden" value="<?php echo $data['deposit_type']; ?>" name="deposit_type">
    </form><br>
    <button id="upload" class="btn text-white btn-sm" style="background:seagreen">Upload</button>
</div>