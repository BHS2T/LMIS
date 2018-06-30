import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.support.ui.Select;

public class TestSample {
    public void  addSample(){
        TestLogin login = new TestLogin();
        WebDriver driver = login.driver;
//        System.setProperty("webdriver.chrome.driver","chromedriver.exe");
        driver.get("http://localhost/LIMS_V3.1/View/index.php");
        WebElement username = driver.findElement(By.id("username"));
        WebElement password = driver.findElement(By.id("password"));
        WebElement loginBtn = driver.findElement(By.id("loginBtn"));
        username.sendKeys("f");
        password.sendKeys("pass");
        loginBtn.click();
        driver.get("http://localhost/LIMS_V3.1/View/addsampleview.php");
        WebElement samplename =    driver.findElement(By.id("samplename"));
        WebElement parameter =   driver.findElement(By.id("parameter"));
        WebElement amount=  driver.findElement(By.id("amount"));
        WebElement sampletype=  driver.findElement(By.id("sampletype"));
        WebElement time=   driver.findElement(By.id("time"));
        WebElement addsample =   driver.findElement(By.id("addsample"));
        samplename.sendKeys("Kebede");
        parameter.sendKeys("Dereje");
        amount.sendKeys("Kebede");
        sampletype.sendKeys("kebedesemail@test.com");
        time.sendKeys("0911111111");
        addsample.click();
        WebElement save =   driver.findElement(By.id("signupF"));
        save.click();
        try{
            WebElement success =driver.findElement(By.id("successTxt"));
            System.out.println("TEST SIGNUP PASSED");
    }
        catch (Exception ex){
            System.out.println("TEST SIGNUP FAILED");

    }
    driver.close();
}

}
