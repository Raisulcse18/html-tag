#include<iostream>
using namespace std;
int maxx(int a,int b){return (a>b)?a:b;}
int knapsack(int w,int wt[],int val[],int n)
{
    int i,we;
    int k[n+1][w+1];
        for(i=0;i<=n;i++){
            for(we=0;we<=w;we++){
                if(i==0 || we==0)
                    k[i][we]=0;
                else if(wt[i-1]<=we)
                    k[i][we]=maxx(val[i-1]+k[i-1][we-wt[i-1]],k[i-1][we]);
                else
                    k[i][we]=k[i-1][we];
            }

        }
        return k[n][we];
}
int main(){
    int i,n,val[20],wt[20],w;
    cout<<"enter muber of item"<<endl;
    cin>>n;
    cout<<"enter value and weight of item"<<endl;
    for(int i=0;i<n;i++)
    {
        cin>>val[i]>>wt[i] ;
    }
    cout<<"enter size of knapsack"<<endl;
    cin>>w;
    cout<<knapsack(w,wt,val,n)<<endl;
    return 0;
}
